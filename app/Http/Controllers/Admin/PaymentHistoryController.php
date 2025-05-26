<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaymentHistoryController extends Controller
{

    var $column_order = array(null,'username', 'product_id','status','amount','coins','transaction_id','source','created_at', null); //set column field database for datatable orderable

    var $column_search = array('u.username', 'product_id','status','amount','coins','transaction_id','source','created_at'); //set column field database for datatable searchable

    var $order = array('id' => 'asc'); // default order

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.payment_history.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    
    }

    public function view($id)
    {
        
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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function serverProcessing(Request $request)
    {
        $currentPath = url(config('app.admin_url')) . '/payment_history/';

        $list = $this->get_datatables($request);

        $data = array();
        $no = $request->start;
        foreach ($list as $category) {
            $no++;
            $row = array();
            $row[] = '<div class="align-center"><input id="cb' . $no . '" name="key_m[]" class="delete_box blue-check" type="checkbox" data-val="' . $category->id . '"><label for="cb' . $no . '"></label></div>';
            $row[] = $category->username;
            $row[] = $category->product_id;
            $row[] = $category->status;
            $row[] = $category->amount;
            $row[] = $category->coins;
            $row[] = $category->transaction_id;
            $row[] = $category->source;
            $row[] = $category->created_at;
            $row[] = '<a class="delete deleteSelSingle btn btn-danger text-white" style="cursor:pointer;" data-val="' . $category->id . '"><i class="fa fa-trash"></i></a>';
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
        $candidateRS = DB::table('payment_history as ph')
            ->select(DB::raw("ph.*,u.username"))->leftJoin('users as u','u.user_id','ph.user_id');

        $strWhere = "ph.id > 0";
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
        $categoryRS = DB::table('payment_history as ph')
        ->select(DB::raw("count(ph.id) as total"))->leftJoin('users as u','u.user_id','ph.user_id')->first();
        return $categoryRS->total;
    }

    public function delete(Request $request)
    {
        $ids = explode(',', $request->ids);
        foreach ($ids as $id) {
            DB::table('payment_history')->where('id', $id)->delete();
        }

        if (count($ids) > 1) {
            $msg = "Transactions deleted successfully";
        } else {
            $msg = "Transaction deleted successfully";
        }
        $request->session()->put('success', $msg);
        return response()->json(['status' => 'success']);
    }

    public function copyContent($id)
    {
    }
}
