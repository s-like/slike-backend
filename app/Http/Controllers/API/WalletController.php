<?php

namespace App\Http\Controllers\API;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
	private function _error_string($errArray)
	{
		$error_string = '';
		foreach ($errArray as $key) {
			$error_string .= $key . "\n";
		}
		return $error_string;
	}

	public function purchaseProduct(Request $request)
	{
		if (auth()->guard('api')->user()) {
			$validator = Validator::make($request->all(), [
				'product_id'          => 'required',
				'amount'          => 'required',
				'coins'          => 'required',
				// 'transaction_id' => 'required',
				'status' => 'required'
			], [
				'product_id.required'   => 'Product Id  is required.',
				'amount.required'   => 'Product Id  is required.',
				'coins.required'   => 'Product Id  is required.',
				// 'transaction_id.required' => 'Transaction Id  is required.',
				'status.required' => 'Status is required.'
			]);

			if (!$validator->passes()) {
				return response()->json(['status' => false, 'msg' => $this->_error_string($validator->errors()->all())]);
			} else {
				$product_id = $request->product_id;
				$amount = $request->amount;
				$raw_amount = isset($request->raw_amount) ? $request->raw_amount : '';
				$coins = $request->coins;
				$transaction_id = isset($request->transaction_id) ? $request->transaction_id : '';
				$status = isset($request->status) ? $request->status : '';
				$message = isset($request->message) ? $request->message : '';
				$transaction_date = isset($request->transaction_date) ? $request->transaction_date : '';
				$source = isset($request->source) ? $request->source : '';
				$user_id = auth()->guard('api')->user()->user_id;
				DB::table('payment_history')->insert([
					'product_id' => $product_id,
					'amount' => $amount,
					'coins' => $coins,
					'transaction_id' => $transaction_id,
					'transaction_date' => $transaction_date,
					'source' => $source,
					'status' => $status,
					'message' => $message,
					'user_id' => $user_id,
					'raw_amount' => $raw_amount,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				]);

				if($status=='purchased'){
					DB::table('wallet_history')->insert([
						'challenge_id' => 0,
						'amount' => $amount,
						'raw_amount' => $raw_amount,
						'coins' => $coins,
						'type' => 'C',
						'status' => 'You have purchased '.$coins.' coins.',
						'user_id' => $user_id,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					]);

					$wallet_amount = auth()->guard('api')->user()->wallet_amount;
					$wallet_amount=$wallet_amount+$coins;
					DB::table('users')->where('user_id', $user_id)->update(['wallet_amount' => $wallet_amount]);
					$mail_settings = DB::table("mail_settings")->where("m_id",1)->first();
                    if($mail_settings){
    					try {
    					    $company_settings = DB::table("settings")->where("setting_id",1)->first();
                            $admin_email = $company_settings->site_email;
                            $site_name = $company_settings->site_name;
                            $from_email = $mail_settings->from_email;
    						$user = DB::table('users')->where('active', 1)
    							->where('deleted', 0)
    							->where('coin_sent', 0)
    							->where('user_id', $user_id)
    							->first();
    						$mailBody = "<div style='margin-bottom:60px;'><b>Dear ".$site_name." Admin,</b><br /> <br />
    						" . $user->username . " has bought " . $coins . " coins<br/></div>";
    						$array = array('subject' => $site_name." - User(".$user->username.")  bought ".$coins." coins in-app purchase", 'view' => 'emails.site.company_panel', 'body' => $mailBody);
    						Mail::to($admin_email)->send(new SendMail($array));
    					} catch (\Exception $e) {
    					    \Log::info($e);
    					   // dd($e);
    					}
                    }
				}
				return response()->json(['status' => true, 'msg' => 'Record updated!']);
			}
		}else{
            return response()->json([
                "status" => false, "msg" => "Unauthorized user!"
            ]);
        }
	}

	public function entry(Request $request)
	{
		if (auth()->guard('api')->user()) {
			$validator = Validator::make($request->all(), [
				// 'type'          	=> 'required',
				// 'coins'         	=> 'required',
				'challenge_id'  	=> 'required'
			], [
				// 'type.required'   	=> 'Type  is required.',
				// 'coins.required'    => 'Coins  is required.',
				'challenge_id.required'   => 'Amount  is required.'
			]);

			if (!$validator->passes()) {
				return response()->json(['status' => false, 'msg' => $this->_error_string($validator->errors()->all())]);
			} else {
				$user_id = auth()->guard('api')->user()->user_id;
				$wallet_amount = auth()->guard('api')->user()->wallet_amount;
				// $type = $request->type;
				// $coins = $request->coins;
				$challenge_id = $request->challenge_id;
				$challenge=DB::table('challenges')->where('id',$challenge_id)->first();
				$coins=$challenge->price;
				$type='D';
				// if ($type == 'C') {
				// 	$wallet_amount = $wallet_amount + $coins;
				// } else {
					if ($wallet_amount < $coins) {
						return response()->json(['status' => false, 'msg' => 'you have insufficient balance!']);
					}
					$wallet_amount = $wallet_amount - $coins;
				// }

				DB::table('wallet_history')->insert([
					'challenge_id' => $challenge_id,
					'coins' => $coins,
					'amount' => 0,
					'raw_amount' => '',
					'type' => $type,
					'status' => 'Coins deducted for joining the challenge '.$challenge->title,
					'user_id' => $user_id,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				]);

				DB::table('users')->where('user_id', $user_id)->update(['wallet_amount' => $wallet_amount]);
				try {
					$user = DB::table('users')->where('active', 1)
						->where('deleted', 0)
						->where('coin_sent', 0)
						->where('user_id', $user_id)
						->first();
					$mailBody = "<b>Dear Admin,<b><br /> <br />
					" . $user->username . " has spent " . $coins . " coins on ".$challenge->title." challenge";

					$array = array('subject' => "User spent coins ", 'view' => 'emails.email', 'body' => $mailBody);
					Mail::to('sandeep@slike.com')->send(new SendMail($array));
				} catch (\Exception $e) {
				}
				
				return response()->json(['status' => true, 'msg' => 'Record updated!']);
			}
		}else{
            return response()->json([
                "status" => false, "msg" => "Unauthorized user!"
            ]);
        }
	}

	public function walletHistory(Request $request)
	{
    	if (auth()->guard('api')->user()) {
    	    $user_id=auth()->guard('api')->user()->user_id;
    	    
            $wallet_amount=	DB::table('users')->where('user_id', $user_id)->first();
            $wallet_amount=$wallet_amount->wallet_amount;
            $history=DB::table('wallet_history')->select(DB::raw("*,LOWER(DATE_FORMAT(created_at,'%Y-%m-%d %H:%i:%s')) as created_at"))->where('user_id',$user_id)->orderBy('id','desc');
            $total=$history->get()->count();
            $history=$history->paginate(10)->items();
            
            // fd_newuser_200_coins
            $new_user_coin=0;
            $payment=DB::table('payment_history')->where('user_id',$user_id)->where('product_id','fd_newuser_200_coins')->exists();
            if($payment){
                $new_user_coin=1;
            }
            
            return response()->json([
    			"status" => true, "data" => $history,'total'=> $total, 'wallet_amount' => $wallet_amount,'new_user_coin' => $new_user_coin
    		]);
            
    	}else{
    		return response()->json([
    			"status" => false, "msg" => "Unauthorized user!"
    		]);
    	}
	}
	
	public function paymentTypes(Request $request){
	    $types=DB::table('payment_types')->get();
	    
	    return response()->json(['status'=> true, 'data' => $types]);
	}
	
	public function withdrawRequest(Request $request){
	   // withdraw_requests
	   
	   if(auth()->guard('api')->user()){
    	    $payment_type_id = isset($request->payment_type_id) ? $request->payment_type_id : '';
    	    $payment_id = isset($request->payment_id) ? $request->payment_id : '';
    	    $user_id = auth()->guard('api')->user()->user_id;
    	    $amount = isset($request->amount) ? $request->amount : '';
    	    $coins = isset($request->coins) ? $request->coins : '';
    	    $currency = isset($request->currency) ? $request->currency : '';
    	    $currency_code = isset($request->currency_code) ? $request->currency_code : '';
    	    $upi = isset($request->upi) ? $request->upi : '';
    	    
    	    $acc_holder_name = isset($request->acc_holder_name) ? $request->acc_holder_name : '';
    	    $bank_name = isset($request->bank_name) ? $request->bank_name : '';
    	    $acc_no = isset($request->acc_no) ? $request->acc_no : '';
    	    $ifsc_code = isset($request->ifsc_code) ? $request->ifsc_code : '';
    	    $iban = isset($request->iban) ? $request->iban : '';
    	    $country = isset($request->country) ? $request->country : '';
    	    $city = isset($request->city) ? $request->city : '';
    	    $address = isset($request->address) ? $request->address : '';
    	    $postcode = isset($request->postcode) ? $request->postcode : '';
    	    
    	    $status='P';
    	   
    	   $user=auth()->guard('api')->user();
    	   if($user->wallet_amount >= $coins){
    	        $data=[
        	        'payment_type_id' => $payment_type_id,
        	        'payment_id' => $payment_id,
        	        'user_id' => $user_id,
        	        'amount' => $amount,
        	        'coins' => $coins,
        	        'currency' => $currency,
        	        'currency_code' => $currency_code,
        	        'upi' => $upi,
        	        'acc_holder_name' => $acc_holder_name,
        	        'bank_name' => $bank_name,
        	        'acc_no' => $acc_no,
        	        'ifsc_code' => $ifsc_code,
        	        'iban' => $iban,
        	        'country' => $country,
        	        'city' => $city,
        	        'address' => $address,
        	        'postcode' => $postcode,
        	        'status' => $status,
        	        'created_at' => date('Y-m-d H:i:s'),
        	        'updated_at' => date('Y-m-d H:i:s'),
    	        ];
    	        
    	       DB::table('withdraw_requests')->insert($data);
        	   $wallet_amount=($user->wallet_amount - $coins);
        	   DB::table('users')->where('user_id',$user_id)->update(['wallet_amount'=>$wallet_amount]);
        	   return response()->json(['status'=> true, 'data' => 'Request Sent!']);
    	   }else{
    	       return response()->json(['status'=> false, 'data' => 'Insufficent Balance!']);
    	   }
    	   
	   }else{
	       return response()->json(['status'=> false, 'msg' => 'Unauthorized user!']);
	   }
	} 
	
	public function withdrawRequestsList(Request $request){
	    if(auth()->guard('api')->user()){
	        $user_id = auth()->guard('api')->user()->user_id;
	        $requests=DB::table('withdraw_requests')->where('user_id',$user_id)->where('status','P')->orderBy('id','desc');
	        $total=$requests->get()->count();
	        $requests=$requests->paginate(10);
	        return response()->json(['status'=> true, 'data' => $requests->items(),'total'=>$total]);
	    
    	}else{
	       return response()->json(['status'=> false, 'msg' => 'Unauthorized user!']);
	   }
	}
}
