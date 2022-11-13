<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KhaltiController extends Controller
{
    //

    function confirmKhalti(Request $request){
        $trans_token = $request["trans_token"];
        $amount = $request["amount"];

        if(empty($trans_token) || empty($amount)){
            return response()->json(['message'=>'Something Went Wrong']);
        }

        
        DB::table('bookings')->where('id','=',session('bookingid'))->update(['rent_status'=>'requested','payment_method'=>'khalti','payment_status'=>'paid']);
        return response()->json(['location'=>'/bike/rent-done/' . session('bookingid')]);

        // $args = http_build_query(array('token' => $trans_token, 'amount' => $amount));
        // $url = "https://khalti.com/api/v2/payment/verify/";
 
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        // $headers = ['Authorization: Key ' . "test_secret_key_3c09df7ed76945eeb47ca617f34d81c7"];
 
        
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // $response       = curl_exec($ch);
        // $status_code    = curl_getinfo($ch, CURLINFO_HTTP_CODE);        
        // $res            = json_decode($response, true);
        // curl_close($ch);

        

        // if (isset($res['idx']) && strtolower($res['state']['template']) == 'is complete' && !empty($res['state']['idx'])) {
        //     DB::table('bookings')->where('id','=',session('bookingid'))->update(['rent_status'=>'requested','payment_method'=>'khalti','payment_status'=>'unpaid']);
        //     return response()->json(['location'=>'/bike/rent-done/' . session('bookingid')]);
        // }

    }
}
