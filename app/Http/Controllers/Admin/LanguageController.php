<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class LanguageController extends Controller
{

    var $column_order = array(null, 'name', 'code'); //set column field database for datatable orderable

    var $column_search = array('name', 'code'); //set column field database for datatable searchable

    var $order = array('id' => 'asc'); // default order

    public function __construct()
    {
        $this->middleware('app_version_check', ['only' => ['edit', 'delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private function _error_string($errArray)
    {
        $error_string = '';
        foreach ($errArray as $key) {
            $error_string .= $key . "\n";
        }
        return $error_string;
    }


    public function index()
    {
        $menu = 'Languages';
        $menuUrl = route('admin.languages.index');
        return view("admin.languages", compact('menu', 'menuUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'add';
        $menu = 'Languages';
        $menuUrl = route('admin.languages.index');

        $submenu = 'Add Language';
        $submenuUrl = route('admin.languages.create');

        return view('admin.languages-create', compact('action', 'menu', 'menuUrl', 'submenu', 'submenuUrl'));
    }

    private function _form_validation($request)
    {

        $rules = [
            'name'        => 'required',
            'code'        => 'required'

        ];
        $messages = [
            'name.required'   => 'Name is required',
            'code.required'              => 'Code is required',

        ];
        $this->validate($request, $rules, $messages);

        $name = $request->name;
        $code = $request->code;


        $postData = array(
            'name'      => $name,
            'code'      => $code,
            'active'    => isset($request->active) ? $request->active : 0

        );
        if($request->hasFile('flag')){
            $path = "public/flags";
      
            $File = $request->file('flag');
            //$t_path = "public/videos/".$request->user_id."/thumb";        
            $imagename = date('Ymdhis').'_'.$File->getClientOriginalName();
        
            $filenametostore = $request->file('flag')->storeAs($path,$imagename);  
                   
            Storage::setVisibility($filenametostore, 'public');
            $fileArray = explode('/',$filenametostore);  
            
            $postData['flag'] = array_pop($fileArray); 
            
        }

        return $postData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m-d H:i:s');
        $data = $this->_form_validation($request);
        $data['created_at'] = $date;
        $data['updated_at'] = $date;
        $id = DB::table('languages')->insertGetId($data);
        $labels = DB::table('labels')->orderBy('id', 'desc')->get();
        foreach ($labels as $label) {
            DB::table('translations')->insertGetId([
                'label_id' => $label->id,
                'language_id' => $id,
                'value' => '',
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
        return redirect(config('app.admin_url') . '/languages')->with('success', 'Language submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $menu = 'Languages';
        $menuUrl = route('admin.languages.index');

        $submenu = 'Edit Language';
        $submenuUrl = route('admin.languages.edit', $id);

        $language = DB::table('languages')->select(DB::raw("*"))->where('id', '=', $id)->first();


        return view('admin.languages-create', compact('language', 'id', 'action', 'menu', 'menuUrl', 'submenu', 'submenuUrl'));
    }


    public function view($id)
    {
        $action = 'view';
        $menu = 'Languages';
        $menuUrl = route('admin.languages.index');

        $submenu = 'View Language';
        $submenuUrl = route('admin.languages_view', $id);

        $language = DB::table('languages')->select(DB::raw("*"))->where('id', '=', $id)->first();

        return view('admin.tags-create', compact('language', 'id', 'action', 'menu', 'menuUrl', 'submenu', 'submenuUrl'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->_form_validation($request);
        $data['updated_at'] = date('Y-m-d H:i:s');
        DB::table('languages')->where('id', $id)->update($data);

        $date = date('Y-m-d H:i:s');
        if ($data['active'] == 1) {
            $labels = DB::table('labels')->orderBy('id', 'desc')->get();
            foreach ($labels as $label) {

                $isTras = DB::table('translations')->where('language_id', $id)->where('label_id', $label->id)->first();
                if (!$isTras) {
                    DB::table('translations')->insertGetId([
                        'label_id' => $label->id,
                        'language_id' => $id,
                        'value' => '',
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                }
            }
        }
        return redirect(config('app.admin_url') . '/languages')->with('success', 'Language updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function serverProcessing(Request $request)
    {
        $currentPath = url(config('app.admin_url')) . '/languages/';

        $list = $this->get_datatables($request);
        $data = array();
        $no = $request->start;
        foreach ($list as $category) {
            $no++;
            $row = array();
            // $row[] = '<a class="view" href="'.$currentPath.$category->tag_id.'/'.'view"><i class="fa fa-search"></i></a><a class="edit" href="'.$currentPath.$category->tag_id.'/edit"><i class="fa fa-edit"></i></a><a class="delete deleteSelSingle" style="cursor:pointer;" data-val="'.$category->tag_id.'"><i class="fa fa-trash"></i></a>';
            $row[] = '<div class="align-center"><input id="cb' . $no . '" name="key_m[]" class="delete_box blue-check" type="checkbox" data-val="' . $category->id . '"><label for="cb' . $no . '"></label></div>';
            $row[] = $category->name;
            $row[] = $category->code;
            $row[] = '<a class="view btn btn-success green-bg text-white" href="' . $currentPath . $category->id . '/' . 'view"><i class="fa fa-search"></i></a> <a class="edit btn btn-warning button-green text-white" href="' . $currentPath . $category->id . '/edit"><i class="fa fa-edit"></i></a> <a class="delete deleteSelSingle btn btn-danger text-white" style="cursor:pointer;" data-val="' . $category->id . '"><i class="fa fa-trash"></i></a>';


            $data[] = $row;
        }

        $output = array(
            "draw" => $request->draw,
            "recordsTotal" => $this->count_all($request),
            "recordsFiltered" => $this->count_filtered($request),
            "data" => $data,
        );
        echo json_encode($output);
    }

    private function _get_datatables_query($request)
    {
        $keyword = $request->search['value'];
        $order = $request->order;
        $candidateRS = DB::table('languages')
            ->select(DB::raw("*"));

        $strWhere = " id!=0 ";
        $strWhereOr = "";
        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($keyword) // if datatable send POST for search{
                $strWhereOr = $strWhereOr . " $item like '%" . $keyword . "%' or ";
        }
        $strWhereOr = trim($strWhereOr, "or ");
        if ($strWhereOr != "") {
            $candidateRS = $candidateRS->whereRaw(DB::raw($strWhere . " and (" . $strWhereOr . ")"));
        } else {
            $candidateRS = $candidateRS->whereRaw(DB::raw($strWhere));
        }


        if (isset($order)) // here order processing
        {
            $candidateRS = $candidateRS->orderBy($this->column_order[$request->order['0']['column']], $request->order['0']['dir']);
        } else if (isset($this->order)) {
            $orderby = $this->order;
            $candidateRS = $candidateRS->orderBy(key($orderby), $orderby[key($orderby)]);
        }

        return $candidateRS;
    }

    function get_datatables($request)
    {
        $candidateRS = $this->_get_datatables_query($request);

        if ($request->length != -1) {
            $candidateRS = $candidateRS->limit($request->length);
            if ($request->start != -1) {
                $candidateRS = $candidateRS->offset($request->start);
            }
        }

        $candidates = $candidateRS->get();

        return $candidates;
    }

    function count_filtered($request)
    {
        $candidateRS = $this->_get_datatables_query($request);
        return $candidateRS->count();
    }

    public function count_all($request)
    {
        $candidateRS = DB::table('languages')->select(DB::raw("count(*) as total"))->first();
        return $candidateRS->total;
    }

    public function delete(Request $request)
    {
        $rec_exists = array();
        $del_error = '';
        $ids = explode(',', $request->ids);
        foreach ($ids as $id) {
            DB::table('languages')->where('id', $id)->delete();
        }

        if ($del_error == 'error') {
            // $request->session()->put('error',$msg );
            return response()->json(['status' => 'error', "rec_exists" => $rec_exists]);
        } else {
            if (count($ids) > 1) {
                $msg = "Language deleted successfully";
            } else {
                $msg = "Language deleted successfully";
            }
            $request->session()->put('success', $msg);
            return response()->json(['status' => 'success', "rec_exists" => $rec_exists]);
        }
        return redirect()->back();
    }

    public function copyContent($id)
    {
        $action = 'copy';
        $language = DB::table('languages')->select(DB::raw("*"))->where('id', '=', $id)->first();
        return view('admin.languages-create', compact('id', 'language'));
    }
}
