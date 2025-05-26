<?php

namespace App\Http\Controllers\Admin;

// use Mail;
use Notification;
use App\User;
// use App\Mail\Admin\SendMail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class SendCoinController extends Controller
{

    var $column_order = array(null, null, 'username', 'type', 'coins', 'status', 'created_at'); //set column field database for datatable orderable

    var $column_search = array('username', 'type', 'coins', 'status', 'created_at'); //set column field database for datatable searchable

    var $order = array('id' => 'desc'); // default order

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.send_coins.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'add';
        return view('admin.send_coins.create', compact('action'));
    }

    private function _form_validation($request)
    {
        // dd($request->all());
        $rules = [
            'user_id' => 'required',
            'coins' => 'required'
        ];
        $messages = [
            'user_id.required' => 'You can\'t leave User field empty',
            'coins.required'    => 'You can\'t leave coins field empty'
        ];
        $this->validate($request, $rules, $messages);

        $postData = array(
            'user_id'       => $request->user_id,
            'coins'         => $request->coins,
            'type'          => 'C',
            'status'        =>  "<b>".config('app.company_name') . "</b> sent you " . $request->coins . " coins"
        );

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
        DB::table('wallet_history')->insert($data);
        DB::table('users')->where('user_id', $request->user_id)->increment('wallet_amount', $request->coins);

        // send notification
        $user=DB::table('users')->where('user_id',$request->user_id)->first();
        $not_data['added_on'] = date("Y-m-d H:i:s");
        $not_data['notify_to'] = $user->user_id;
        $not_data['message'] = config('app.company_name') . " sent you ". $request->coins ." coins";
        $not_data['type'] = "G";
        $not_data['video_id'] = 0;
        $not_data['notify_by'] = 0;
        DB::table('notifications')->insert($not_data);
        

        $mailBody = "<b>Dear " . $user->username . ",<b><br /> <br />
            Welcome to " . config('app.company_name') . "! We're excited to have you as part of our community.. <br />
        
        As a token of our appreciation for joining us, we're giving you ".$request->coins." coins to use in the app. 
        These coins can be used to send gifts to your friends and loved ones within the app. 
        What's more, the gifts they receive can be redeemed for real money! <br />
        <br />
        
        Spread joy and earn real rewards with ".config('app.company_name')."! Here's how it works:
        <br />
        Use your ".$request->coins." coins to send gifts to friends and family.<br />
        They receive your thoughtful gifts and can redeem them for real money.<br />
        <br />
        Claim your ".$request->coins." coins now.<br />
        Thank you for choosing ".config('app.company_name').". We can't wait to see the joy you bring to others!<br /><br />
        Best regards, <br />" . config('app.company_name');

        $array = array('subject' => "Welcome to " . config('app.company_name') . "! Here's ".$request->coins." coins to get you started 🎁", 'view' => 'emails.site.company_panel', 'body' => $mailBody);

        try {
            Mail::to($user->email)->send(new SendMail($array));
        } catch (\Exception $e) {
            \Log::info($e);
        }

        try {
            if ($user->fcm_token && $user->fcm_token != "" && $user->fcm_token != null) {
                $title = $request->coins." COINS RECEIVED";
                $message = config('app.company_name') . " sent you ".$request->coins." coins";
                $fcmTokens = [$user->fcm_token];
                $image = '';
                // $image = asset(Storage::url('gifts')) . '/' . $gift->icon;
                $param = ['id' => -1, 'type' => 'wallet', 'page' => '/my-wallet', 'image' => $image, 'to_id' => $user->user_id, 'from_id' => 0];
                // Notification::send(null, new UserNotification($title, $message, $image, $param, $fcmTokens));
                $user=User::where('user_id',$user->user_id)->first();  
                $user->notify(new UserNotification($title, $message, $image, $param));
            }
        } catch (\Exception $e) {
        }

        return redirect(config('app.admin_url') . '/send-coins')->with('success', 'Coins sent successfully');
    }

    // get users
    public function getUsers(Request $request)
    {
        $search = $request->searchTerm;
        // $cat_id = $request->cat_id;
        // dd($country_id);
        $users = DB::table('users')->where('user_id', '<>', 0);

        if ($search != '') {
            $users = $users->where('username', 'like', '%' . $search . '%');
            $users = $users->orWhere('fname', 'like', '%' . $search . '%');
             $users = $users->orWhere('email', 'like', '%' . $search . '%');
        }
        $users = $users->limit(5)->get();
        $response = array(); // select2 wants id and text so we declare $response array otherwise no need

        foreach ($users as $user) {
            $response[] = array(
                "id" => $user->user_id,
                "text" => $user->username.' ('.$user->email.')'
            );
        }
        return response()->json($response);
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
        $currentPath = url(config('app.admin_url')) . '/send-coins/';

        $list = $this->get_datatables($request);

        $data = array();
        $no = $request->start;
        foreach ($list as $category) {
            $no++;
            $row = array();
            // $row[] = '<a class="view" href="' . $currentPath . $category->id . '/' . 'view"><i class="fa fa-search"></i></a><a class="edit" href="' . $currentPath . $category->id . '/edit"><i class="fa fa-edit"></i></a> <a class="delete deleteSelSingle" style="cursor:pointer;" data-val="' . $category->id . '"><i class="fa fa-trash"></i></a>';
            // $row[] = '<div class="align-center"><input id="cb' . $no . '" name="key_m[]" class="delete_box blue-check" type="checkbox" data-val="' . $category->id . '"><label for="cb' . $no . '"></label></div>';
            $row[] = $category->username;
            if ($category->type == 'C') {
                $type = 'Credit';
            } else {
                $type = 'Debit';
            }
            $row[] = $type;
            $row[] = $category->coins;

            $row[] = $category->status;
            $row[] = $category->created_at;


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
        $candidateRS = DB::table('wallet_history')
            ->select(DB::raw("wallet_history.*,u.username"))
            ->join('users as u', 'u.user_id', 'wallet_history.user_id');

        $strWhere = "wallet_history.id > 0";
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
        $categoryRS = DB::table('wallet_history')->select(DB::raw("count(*) as total"))->first();
        return $categoryRS->total;
    }

    public function delete(Request $request)
    {
    }

    public function copyContent($id)
    {
    }
}
