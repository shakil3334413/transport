<?php

namespace App\Http\Controllers;
use App\Sms;
use App\Owner;
use App\OwnerBus;
use App\EachbusIncome;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Client;
use App\SendSms;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
class SmsController extends Controller
{
	// private $SMS_SENDER = 'Sample';
	private $RESPONSE_TYPE = 'json';
	private $SMS_USERNAME = 'C20029775c3dd1be3a5ea5.32472784';
	private $SMS_PASSWORD = 'IpvlfezF';
	private $text = 'text';


    public function create()
    {
    	return view('admin.pages.message.create');
    }

    public function Sendsms()
    {
    	$owner=Owner::all();
    	$ownerBus=OwnerBus::all();
    	$sendsms=SendSms::latest();
    	return view('admin.pages.message.sendsms',compact('owner','ownerBus','sendsms'));
    }

    public function smsstore(Request $request)
    {
        $currentDate= Carbon::now()->toDateString();
    	$sendsms=new SendSms();
    	$sendsms->phone_number=$request->phone_number;
    	$phone=$request->phone_number;
    	$sendsms->bus_number=$request->bus_number;
    	$bus=$request->bus_number;
    	$eachbusIncome=EachbusIncome::latest()->whereDate('created_at',$currentDate)
    	->where('number','=',$request->bus_number)
    	->sum('total_income');
        $eachbuscost=EachbusIncome::latest()->whereDate('created_at',$currentDate)
    	->where('number','=',$request->bus_number)
    	->sum('total_cost');
    	$todaycarincome=EachbusIncome::latest()->whereDate('created_at',$currentDate)
    	->where('number','=',$request->bus_number)
    	->sum('todaycarincome');
		$sendsms->save();
    	return view('admin.pages.message.create',compact('phone','bus','eachbusIncome','eachbuscost','todaycarincome'));
    }


	public function getUserNumber(Request $request)
	{
		$owner=Owner::all();
    	$ownerBus=OwnerBus::all();
    	$sender = $request->sender;
		$phone_number = $request->cellNo;
		$phone_number= preg_split("/\r\n|\n|\r/", $phone_number);
		$message=$request->message;
		$priority=$request->priority;

		$this->initiateSmsGuzzle($sender,$phone_number, $message);
		return view('admin.pages.message.sendsms',compact('owner','ownerBus'));
	}



	public function initiateSmsGuzzle($sender,$phone_number, $message)
	{
		// dd($sender,$phone_number,$message);
		$client = new Client();
		foreach($phone_number as $cellNo){
			$response = $client->post('http://bulk.fmsms.biz/smsapi?', [
				//'verify'    =>  false,
				'form_params' => [
					'api_key' => $this->SMS_USERNAME,
					//'password' => $this->SMS_PASSWORD,
					'senderid' => $sender,
					'msg' => $message,
					'contacts' => "88".$cellNo ,
					"type"=> $this->text, 


					
				],
			]);

		$response = json_decode($response->getBody(), true);
		$history=new Sms;
		$history->sender_id=$sender;
		$history->cell_no=$cellNo;
		$history->message=$message;
		$history->status=$response;
		$history->save();
		}
	}

}
