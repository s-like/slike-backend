<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GiftsController extends Controller
{

    var $column_order = array(null, 'name', null, 'coins', null, null); //set column field database for datatable orderable

    var $column_search = array('name', 'coins'); //set column field database for datatable searchable

    var $order = array('id' => 'asc'); // default order

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.gifts.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'add';
        return view('admin.gifts.create', compact('action'));
    }

    private function _form_validation($request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required',
            'icon'     => 'nullable',
            'coins' => 'required'
        ];
        $messages = [
            'name.required' => 'You can\'t leave name field empty',
            'icon.required'    => 'You can\'t leave icon field empty',
            'coins.required'    => 'You can\'t leave coins field empty'
        ];
        $this->validate($request, $rules, $messages);
     
        $postData = array(
            'name'         => $request->name,
            'coins'       => $request->coins,
            'active'       => isset($request->active) ? $request->active : 0
        );

        if ($request->hasFile('icon')) {
            $path = 'public/gifts';
            $ext = $request->file('icon')->getClientOriginalExtension();
            $filenametostore = $request->file('icon')->store($path);
            Storage::setVisibility($filenametostore, 'public');
            $fileArray = explode('/', $filenametostore);
            $image = array_pop($fileArray);
            $postData['icon'] = $image;
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
        $data = $this->_form_validation($request);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        DB::table('gifts')->insert($data);
        return redirect(config('app.admin_url') . '/gifts')->with('success', 'Gift details submitted successfully');
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
        $gift = DB::table('gifts')->select(DB::raw("*"))->where('id', $id)->first();
        return view('admin.gifts.create', compact('gift', 'id', 'action'));
    }

    public function view($id)
    {
        $action = 'view';
        $gift = DB::table('gifts')->select(DB::raw("*"))->where('id', $id)->first();
        return view('admin.gifts.create', compact('gift', 'id', 'action'));
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
        DB::table('gifts')->where('id', $id)->update($data);
        return redirect(config('app.admin_url') . '/gifts')->with('success', 'Gift details updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function serverProcessing(Request $request)
    {
        $currentPath = url(config('app.admin_url')) . '/gifts/';

        $list = $this->get_datatables($request);

        $data = array();
        $no = $request->start;
        foreach ($list as $category) {
            $no++;
            $row = array();
            $row[] = '<div class="align-center"><input id="cb' . $no . '" name="key_m[]" class="delete_box blue-check" type="checkbox" data-val="' . $category->id . '"><label for="cb' . $no . '"></label></div>';
            $row[] = $category->name;
            $row[] = "<img src='".asset(Storage::url('gifts/'.$category->icon))."' width=50>";
            $row[] = $category->coins;

            $active='Yes';
            if($category->active==0){
                $active='No';
            }
            $row[] = $active;
            $row[] = '<a class="view btn btn-success green-bg text-white" href="'.$currentPath . $category->id.'"><i class="fa fa-search"></i></a> <a class="edit btn btn-warning button-green text-white" href="' . $currentPath . $category->id . '/edit"><i class="fa fa-edit"></i></a> <a class="delete deleteSelSingle btn btn-danger text-white" style="cursor:pointer;" data-val="'.$category->id.'"><i class="fa fa-trash"></i></a>';
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
        $candidateRS = DB::table('gifts')
            ->select(DB::raw("*"));

        $strWhere = "id > 0";
        $strWhereOr = "";
        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($keyword) // if datatable send POST for search{
                $strWhereOr = $strWhereOr . " $item like '%" . $keyword . "%' or ";
            //$candidateRS = $candidateRS->orWhere($item, 'like', '%' . $keyword . '%') ;
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
        $categoryRS = $this->_get_datatables_query($request);
        if ($request->length != -1) {
            $categoryRS = $categoryRS->limit($request->length);
            if ($request->start != -1) {
                $categoryRS = $categoryRS->offset($request->start);
            }
        }

        $categories = $categoryRS->get();
        return $categories;
    }

    function count_filtered($request)
    {
        $categoryRS = $this->_get_datatables_query($request);
        return $categoryRS->count();
    }

    public function count_all($request)
    {
        $categoryRS = DB::table('gifts')->select(DB::raw("count(*) as total"))->first();
        return $categoryRS->total;
    }

    public function delete(Request $request)
    {
        $ids = explode(',', $request->ids);
        foreach ($ids as $id) {
            DB::table('gifts')->where('id', $id)->delete();
        }


        if (count($ids) > 1) {
            $msg = "Gifts deleted successfully";
        } else {
            $msg = "Gift deleted successfully";
        }
        $request->session()->put('success', $msg);
        return response()->json(['status' => 'success']);
    }

    public function copyContent($id)
    {
        $action = 'copy';
        $gift = DB::table('gifts')->select(DB::raw("*"))->where('id', '=', $id)->first();
        return view('admin.gifts-create', compact('id', 'gift', 'action', 'type'));
    }
}
