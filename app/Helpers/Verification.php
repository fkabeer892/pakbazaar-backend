<?php

namespace App\Helpers;
use GuzzleHttp\Client;
use DB;
use GuzzleHttp\RequestOptions;
use App\Mail\SendVerificationCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
class Verification extends Model
{
    protected $client;
    protected $default_headers;

    public function __construct(){
        $this->client = new Client(['http_errors' => true, 'verify' => false]);
        $this->default_headers = [];
    }
    public function sendSMS($phone, $message)
    {
       
        $account_sid = env('TWILIO_ACCOUNT_SID');
        $auth_token = env('TWILIO_AUTH_TOKEN');
        $basic = base64_encode("$account_sid:$auth_token");
        $url = env('TWILIO_URL').$account_sid.'/Messages.json';
        $headers = ['Authorization' => "Basic $basic"];

        $form_params = [
            'To' => $phone,
            'From' => env('TWILIO_FROM_PHONE'),
            'Body' => $message
        ];

        try{
            $resp = $this->client->request('POST', $url, [
                'headers'=> $headers,
                'form_params' => $form_params
            ]);

            // $resp->getStatusCode();
            // return $resp->getBody();
            return true;
        } catch(\Exception $e){

            return false;
        }
    }
    public function sendEmail($email,$code){
        try{
          $resp =Mail:: to('shazim96khan@gmail.com')->send(new SendVerificationCode(['code'=> $code]));
        //   return $resp->getBody();
        // /Log::info($resp)
            return true;
        } catch(\Exception $e){
            // dd($e);
            return false;
        }
    }
    public function sendVerificationCode($email)
    {
        $expiry = 15;
        $makingCode = true;
        while ($makingCode) {
            $code = mt_rand(111111, 999999);
            $code_exist = DB::table('verification_codes')
                ->where('code', $code)
                ->count();

            if($code_exist == 0){
                $makingCode = false;
            }
        }
        $id = DB::table('verification_codes')
            ->insertGetId([
                'email' => $email,
                'expiry' => date('Y-m-d H:i:s', strtotime("+$expiry minutes")),
                'code' => $code
            ]);
//        $Update = DB::table('users')
//            ->where('id',$user_id)
//            ->update([
//                'verify_code' => $code,
//                'phone_verify'=>'0'
//            ]);

//        $result = true;
        $result = $this->sendEmail($email, "$code.");
        if($result == true)
            return $code;
        else
            return false;
    }

    public static function VerifyCode($code,$user_id)
    {
        $code_exist = DB::table('verification_codes')
            ->where('code', $code)
            ->where('expiry', '>=', date('Y-m-d H:i:s'))
            ->where('status', '=', 'available')
            ->count();

        if($code_exist > 0){
            DB::table('verification_codes')
                ->where('code', $code)
                ->where('expiry', '>=', date('Y-m-d H:i:s'))
                ->update(['status'=>'used']);

            DB::table('users')
                ->where('verify_code', $code)
                ->where('id',$user_id)
                ->update(['phone_verify'=>'1']);
            return true;
        } else {
            return false;
        }
    }

}


