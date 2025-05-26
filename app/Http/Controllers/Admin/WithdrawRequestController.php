<?php

namespace App\Http\Controllers\Admin;

use Mail;
use Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WithdrawRequestController extends Controller
{

    var $column_order = array('payment_id', 'upi','username','payment_type','coins','amount','status','created_at'); //set column field database for datatable orderable

    var $column_search = array('payment_id', 'upi', 'username','py.name','coins','amount','status','wr.created_at'); //set column field database for datatable searchable

    var $order = array('id' => 'asc'); // default order

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.withdraw_requests.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $action = 'add';
    //     return view('admin.withdraw_requests.create', compact('action'));
    // }

    // private function _form_validation($request)
    // {
    //     // dd($request->all());
    //     $rules = [
    //         'name' => 'required',
    //         'icon'     => 'nullable',
    //         'coins' => 'required'
    //     ];
    //     $messages = [
    //         'name.required' => 'You can\'t leave name field empty',
    //         'icon.required'    => 'You can\'t leave icon field empty',
    //         'coins.required'    => 'You can\'t leave coins field empty'
    //     ];
    //     $this->validate($request, $rules, $messages);
     
    //     $postData = array(
    //         'name'         => $request->name,
    //         'coins'       => $request->coins
    //     );

    //     if ($request->hasFile('icon')) {
    //         $path = 'gifts';
    //         $ext = $request->file('icon')->getClientOriginalExtension();
    //         $filenametostore = $request->file('icon')->store($path);
    //         Storage::setVisibility($filenametostore, 'public');
    //         $fileArray = explode('/', $filenametostore);
    //         $image = array_pop($fileArray);
    //         $postData['icon'] = $image;
    //     }

    //     return $postData;
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $data = $this->_form_validation($request);
    //     $data['created_at'] = date('Y-m-d H:i:s');
    //     $data['updated_at'] = date('Y-m-d H:i:s');
    //     DB::table('gifts')->insert($data);
    //     return redirect(config('app.admin_url') . '/gifts')->with('success', 'Gift details submitted successfully');
    // }

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
        $withdraw_requests = DB::table('withdraw_requests')->select(DB::raw("*"))->where('id', $id)->first();
        return view('admin.withdraw_requests.create', compact('withdraw_requests', 'id', 'action'));
    }

    public function view($id)
    {
        // $action = 'view';
        // $gift = DB::table('gifts')->select(DB::raw("*"))->where('id', $id)->first();
        // return view('admin.gifts.create', compact('gift', 'id', 'action'));
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
        return redirect(config('app.admin_url') . '/withdraw_requests')->with('success', 'Gift details updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function serverProcessing(Request $request)
    {
        $currentPath = url(config('app.admin_url')) . '/withdraw_requests/';

        $list = $this->get_datatables($request);

        $data = array();
        $no = $request->start;
        foreach ($list as $category) {
            $no++;
            $row = array();
            $row[] = $category->payment_id;
            $row[] = $category->upi;
            $row[] = $category->username;
            $row[] = $category->payment_type;
            
            // $row[] = $category->acc_holder_name;
            // $row[] = $category->bank_name;
            // $row[] = $category->acc_no;
            // $row[] = $category->iban;
            // $row[] = $category->ifsc_code;
            // $row[] = $category->country;
            // $row[] = $category->city;
            // $row[] = $category->address;
            // $row[] = $category->postcode;
            
            $row[] = $category->coins;
            $row[] = $category->currency.$category->amount;
            
            $status='<span class=" text-success">Completed</span>';
            if($category->status=='P'){
                $status='<span class=" text-warning">Pending</span>';
            }
            $row[] = $status;
            $row[] = $category->created_at;
            $paymentLinks = '<a class="paid btn btn-primary btn-sm text-light" data-val="'.$category->id.'" title="Mark as paid" href="' . $currentPath . $category->id . '/paid">Paid</a>';
            $paymentLinks .= $category->payment_type=="Paypal" ? 
            ' <a target="_blank" class="btn btn-primary btn-sm text-light" href="'.$category->payment_id.'/'.$category->amount.$category->currency_code.'">Paypal</a>' : "";
            $row[] = $paymentLinks;
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
        $candidateRS = DB::table('withdraw_requests as wr')
            ->select(DB::raw("wr.*,u.username,py.name as payment_type"))
            ->leftJoin('users as u','u.user_id','wr.user_id')
            ->leftJoin('payment_types as py','py.id','wr.payment_type_id');

        $strWhere = "wr.id > 0";
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
        $categoryRS = DB::table('withdraw_requests as wr')
        ->leftJoin('users as u','u.user_id','wr.user_id')
        ->leftJoin('payment_types as py','py.id','wr.payment_id')
        ->select(DB::raw("count(wr.id) as total"))->first();
        return $categoryRS->total;
    }

    public function delete(Request $request)
    {
        $ids = explode(',', $request->ids);
        foreach ($ids as $id) {
            DB::table('withdraw_requests')->where('id', $id)->delete();
        }


        if (count($ids) > 1) {
            $msg = "Withdraw Requests deleted successfully";
        } else {
            $msg = "Withdraw Request deleted successfully";
        }
        $request->session()->put('success', $msg);
        return response()->json(['status' => 'success']);
    }

    public function updateStatus(Request $request)
    {
        $ids = explode(',', $request->ids);
        foreach ($ids as $id) {
            $image='';
            DB::table('withdraw_requests')->where('id', $id)->update(['status'=>'C']);
            $requestRes=DB::table('withdraw_requests')->where('id', $id)->first();
            $user = DB::table('users')->where('user_id',$requestRes->user_id)->first();
            try{
                if($user->fcm_token && $user->fcm_token!="" && $user->fcm_token!=null){
                    $title = "Withdraw Request Accepted";
                    $message = " Your Withdraw request has been accepted by Filmsdream";
                    $fcmTokens = [$user->fcm_token];
                    $param = ['id' => strval($id), 'type' => 'withdraw_request'];
                    // Notification::send(null,new UserNotification($title,$message,null,$param,$fcmTokens));
                    $user=User::where('user_id',$user->user_id)->first();  
                    $user->notify(new UserNotification($title, $message, $image, $param));
                }
            } catch (\Exception $e) {
            }
        }

        $msg = "Withdraw Request Status Updated!";
        $request->session()->put('success', $msg);
        return response()->json(['status' => 'success']);
    }

}
