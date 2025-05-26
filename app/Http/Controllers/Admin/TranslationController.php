<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataExport;
use Illuminate\Http\Request;
use GPBMetadata\Google\Api\Label;
use App\Imports\TranslationImport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;


class TranslationController extends Controller
{

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


    public function index(Request $request)
    {
        $menu = 'Labels/Translations';
        $menuUrl = route('admin.translations');
        // dd(DB::table('labels')->where(DB::raw('BINARY `label`'), 'update Application')->first());

        $languages = DB::table('languages')->Where('active', 1)->orderBy('id', 'asc')->get();
        
        $ids=$languages->pluck('id')->toArray();
        $labels = DB::table('labels')->orderBy('id', 'desc')->get();
        $translations = DB::table('labels as lb')
            ->select(DB::raw("t.*,lb.label as label_name,l.name as language_name"))
            ->leftJoin('translations as t', 'lb.id', 't.label_id')
            ->leftJoin('languages as l',function($q){
                $q->on('l.id', 't.language_id')->where('l.active',1);
            })->whereIn('l.id',$ids);
          
        if ($request->ajax) {
            $search = $request->search;
            $trans = DB::table('translations')->whereRaw("value like  '%" . $search . "%'")->get()->pluck('label_id');
            $translations = $translations->whereIn('lb.id', $trans)->orWhereRaw("(lb.label like  '%" . $search . "%')");
            // $translations=$translations->whereRaw("(t.value like  '%".$search."%') or (lb.label like  '%".$search."%')");
        }
        // ->limit(39)
        // ->orderBy('t.id','desc')
        // $translations = $translations->orderBy('lb.id','desc')
        // ->orderBy('l.id','asc')->limit(10)->get();
        $translations = $translations->orderBy('lb.id','desc')->orderBy('l.id','asc')->get();
        // dd($translations);
        $data = [];
        $records = [];
        foreach ($translations as $translation) {
            $records[$translation->label_id]['label_id'] = $translation->label_id;
            $records[$translation->label_id]['label'] = $translation->label_name;
            $records[$translation->label_id]['translations'][] = [
                'id' => $translation->id,
                'language_id' => $translation->language_id,
                'language_name' => $translation->language_name,
                'value' => $translation->value
            ];
        }

        // foreach ($labels as $label) {
        
        //     $records[$label->id]['label_id'] = $label->id;
        //     $records[$label->id]['label'] = $label->label;
        //     foreach ($languages as $language) {
        //         $translation = DB::table('translations')->where('language_id', $language->id)
        //             ->where('label_id', $label->id)->first();
        //         $value = '';
        //         $translation_id = 0;
        //         // dd($label->id);
        //         if ($translation) {
        //             $value = $translation->value;
        //             $translation_id = $translation->id;
        //         }
        //         $records[$label->id]['translations'][] = [
        //             'id' => $translation_id,
        //             'language_id' => $language->id,
        //             'language_name' => $language->name,
        //             'value' => $value
        //         ];
        //     }
        // }

        // dd($records);
        $paginatedRecords = $this->paginate($records, 15);
        if ($request->ajax) {
            $view = view('admin.translations-table', compact('menu', 'menuUrl', 'paginatedRecords', 'languages'))->render();
            return $view;
        }
        return view('admin.translations', compact('menu', 'menuUrl', 'paginatedRecords', 'languages'));
    }

    /**
     * Paginate an array of items.
     *
     * @return LengthAwarePaginator         The paginated items.
     */
    private function paginate(array $items, int $perPage = 5, ?int $page = null, $options = []): LengthAwarePaginator
    {
        $page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
        $items = collect($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function create()
    {
        $languages = DB::table('languages')->Where('active', 1)->orderBy('id', 'asc')->get();

        $action = 'add';
        $menu = 'Label/Translation';
        $menuUrl = route('admin.translations');

        $submenu = 'Add Label/Translation';
        $submenuUrl = route('admin.translations.create');

        return view('admin.translations-create', compact('action', 'menu', 'menuUrl', 'submenu', 'submenuUrl', 'languages'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->label[$x]);
        $total = count($request->label);
        $date = date('Y-m-d H:i:s');
        for ($x = 0; $x < $total; $x++) {
            $label_id = DB::table('labels')->insertGetId([
                'label' => $request->label[$x],
                'active' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]);

            $languages = DB::table('languages')->Where('active', 1)->orderBy('id', 'asc')->get();
            foreach ($languages as  $language) {
                $code = $language->code;
                $language_id = $language->id;
                $value = $request->$code[$x];
                DB::table('translations')->insertGetId([
                    'label_id' => $label_id,
                    'language_id' => $language_id,
                    'value' => $value,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }
        }

        return redirect(config('app.admin_url') . '/translations')->with('success', 'Label/Translations submitted successfully');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $value = $request->value;

        $label_id = isset($request->label_id) ? $request->label_id : 0;
        $language_id = isset($request->language_id) ? $request->language_id : 0;
        if ($type == 'L') {
            DB::table('labels')->where('id', $id)->update(['label' => $value]);
        } elseif ($type == 'T') {
            if ($id == 0) {
                DB::table('translations')->where('id', $id)->insert([
                    'label_id' => $label_id,
                    'language_id' => $language_id,
                    'value' => $value,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            } else {
                DB::table('translations')->where('id', $id)->update(['value' => $value, 'updated_at' => date('Y-m-d H:i:s')]);
            }
        }

        return true;
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        DB::table('labels')->where('id', $id)->delete();
        DB::table('translations')->where('label_id', $id)->delete();
        return true;
    }

    public function addMore(Request $request)
    {
        $languages = DB::table('languages')->Where('active', 1)->orderBy('id', 'asc')->get();
        $title = 'Add Translation';
        return view('admin.translation-add-card', compact('languages', 'title'))->render();
    }

    public function export(Request $request)
    {
        $headings =  array(
            // 'label_id'      => 'Id',
            'label'      => 'Label',
        );
        $languages = DB::table('languages')->Where('active', 1)->orderBy('id', 'asc')->get();
        foreach ($languages as $language) {
            $headings[$language->name] = $language->name;
        }
 
        $translations = DB::table('labels as lb')
            ->select(DB::raw("t.*,lb.label as label_name,l.name as language_name"))
            ->leftJoin('translations as t', 'lb.id', 't.label_id')
            ->leftJoin('languages as l', function ($q) {
                $q->on('l.id', 't.language_id')->where('l.active', 1)->orderBy('id', 'asc');
            });

        $translations = $translations->orderBy('lb.id', 'desc')->orderBy('t.language_id', 'asc')->get();
        // dd($translations);
        $data = [];
        $records = [];
        foreach ($translations as $translation) {
            $records[$translation->label_id]['label_id'] = $translation->label_id;
            $records[$translation->label_id]['label'] = $translation->label_name;
            $records[$translation->label_id]['translations'][] = [
                'id' => $translation->id,
                'language_id' => $translation->language_id,
                'language_name' => $translation->language_name,
                'value' => $translation->value
            ];
            
        }


        $data = array();
        array_push($data, $headings);

        $x = 1;
        foreach ($records as $record) {
            $arr = [];
            // $arr['label_id'] = $record['label_id'];
            $arr['label'] = $record['label'];
            foreach ($record['translations'] as $tr) {
                $arr[$tr['language_name']] = $tr['value'];
            }
            array_push($data, $arr);
            $x++;
        }

        return Excel::download(new DataExport($data), 'translations_' . date('y-m-d') . '.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx'
        ]);

        if ($request->has('file')) {
            $import = new TranslationImport();
            Excel::import($import, $request->file('file'));

            return redirect(route('admin.translations'))->with('success', 'Translation records updated!');
        } else {
            return redirect(route('admin.translations'))->with('error', 'Please Select the File');
        }
    }
}
