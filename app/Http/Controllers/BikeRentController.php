<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Bike;
use App\Models\Booking;
use App\Models\Brand;
use App\Models\ChatMessage;
use App\Models\Review;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;

use function PHPUnit\Framework\isEmpty;

class BikeRentController extends Controller
{
    //
    function index(Bike $bike)
    {
        return view('bikes.bike-checkout', ['bike' => $bike]);
    }

    function bikeAll()
    {
        $bikes = Bike::paginate(2);
        $count = $bikes->count();
        $brands = Brand::all();
        $all = Bike::all()->count();

        return view('bikes.bikes-all', ['bikes' => $bikes, 'brands' => $brands, 'count' => $count, 'all'=>$all]);
    }

    function bikeSingle(Bike $bike)
    {
        $reviews = Review::where('bike_id', '=', $bike->id)->get();
        $latestBikes = Bike::where('id','!=',$bike->id)->limit(3)->get();
        
        return view('bikes.bike-single', ['sbike' => $bike, 'reviews' => $reviews,'latestBikes'=>$latestBikes]);
    }

    function rentNow(Bike $bike, Request $request)
    {
        $user = Auth::id();
        $validator = Validator::make($request->all(), [
            'fromDate' => 'required',
            'toDate' => 'required',
            'info' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'message' => 'The From Date and To Date are Required']);
        }

        $fromDate = $request->fromDate;
        $from = date_create($fromDate); 

        $today  = new DateTime('today');
        if ($from < $today) {
            return response()->json(['status' => 'fail', 'message' => 'From Date is Invalid']);
        }

        $toDate = $request->toDate;
        $to = date_create($toDate);

        $dateDiff = date_diff($from, $to);
        $diff = $dateDiff->format("%R%a");
        $diffInt = (int)$diff;

        if ($diffInt < 1) {
            return response()->json(['status' => 'fail', 'message' => 'You must Rent a bike for AT LEAST ONE DAY']);
        }

        $totalPrice = $diffInt * $bike->priceperday;

        $booking = new Booking();

        $booking->user_id = Auth::id();
        $booking->bike_id = $bike->id;
        $booking->fromDate = $from;
        $booking->toDate = $to;
        $booking->days = $diffInt;
        if ($request->info == '') {
            $booking->message = 'none';
        } else {
            $booking->message = $request->info;
        }
        $booking->total = $totalPrice;
        $booking->rent_status = 'pending';
        $booking->payment_method = '';
        $booking->payment_status = '';

        $save = $booking->save();

        $link = '/bike/rent/' . $bike->id . '/done' . '/' . $user;
        if ($save) {
            return response()->json(['status' => 'success', 'message' => "Booking Was Successful", 'link' => $link]);
        } else {
            return response()->json(['status' => 'fail', 'message' => "Something Went Wrong. Refresh the page"]);
        }
    }

    function rentDone(Bike $bike, User $user)
    {
        if ($user->id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $booking = DB::table('bookings')->where('user_id', '=', $user->id)->where('bike_id', '=', $bike->id)->where('rent_status', '=', 'pending')->first();

        if ($booking) {
            return view('bikes.bike-checkout', ['booking' => $booking, 'bike' => $bike]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    function rentUpdate(Booking $booking, Request $request)
    {
        // return $request;
        $books = DB::table('bookings')->find($booking->id);

        $bike = Bike::find($booking->bike_id);
        $user = User::find($booking->user_id);
        if (Auth::id() !== $booking->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $id = $booking->id;
        $book = Booking::find($booking->id);
        $book->touch();
        if ($books) {
            $request->validate([
                'ratio' => 'required'
            ]);

            if ($request->ratio == 'poa') {
                Booking::where('id', '=', $booking->id)->update(['rent_status' => 'requested', 'payment_method' => 'payment on arrival', 'payment_status' => 'unpaid']);
                $link = 'http://127.0.0.1:8000/bike/rent-done/' . $id;
                return response()->json(['message' => 'poa', 'link' => $link]);
            }
            if ($request->ratio == 'khalti') {
                // $_SESSION['khaltiamount'] = $booking->total;
                // $_SESSION['bookingid'] = $booking->id;

                // Session::set('khaltiamount', $booking->total);
                session(['khaltiamount' => $booking->total, 'bookingid' => $booking->id]);
                return response()->json(['method' => 'khalti', 'amount' => $booking->total * 100]);
                // Booking::where('id','=',$booking->id)->update(['rent_status'=>'requested','payment_method'=>'khalti','payment_status'=>'unpaid']);
            }

            return view('bikes.done', ['booking' => $books, 'bike' => $bike, 'user' => $user]);
        } else {
            return "Something Went Wrong";
        }
    }


    // function confirmKhalti(Request $request){
    //     $trans_token = $request["trans_token"];
    //     $amount = $request["amount"];

    //     if(empty($trans_token) || empty($amount) || $amount != ($_SESSION['khaltiamount']/100) || !isset($_SESSION['bookingid'])){
    //         return response()->json(['message'=>'Something Went Wrong']);
    //     }
    //     $args = http_build_query(array('token' => $trans_token, 'amount' => $amount));
    //     $url = "https://khalti.com/api/v2/payment/verify/";

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //     $headers = ['Authorization: Key ' . "test_secret_key_3c09df7ed76945eeb47ca617f34d81c7"];

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     $response       = curl_exec($ch);
    //     $status_code    = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     $res            = json_decode($response, true);
    //     curl_close($ch);

    //     if (isset($res['idx']) && strtolower($res['state']['template']) == 'is complete' && !empty($res['state']['idx'])) {
    //         // DB::table('bookings')->where('id','=',$_SESSION['bookingid'])->update(['rent_status'=>'requested','payment_method'=>'khalti','payment_status'=>'unpaid']);
    //         return response()->json(['location'=>'/bike/rent-done/' . $_SESSION['bookingid']]);
    //     }

    // }

    function showBooking(Booking $booking)
    {

        $books = DB::table('bookings')->find($booking->id);
        $bike = Bike::find($booking->bike_id);
        $user = User::find($booking->user_id);
        if (Auth::id() !== $booking->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('bikes.done', ['booking' => $books, 'bike' => $bike, 'user' => $user]);
    }

    function downloadOrder(Booking $booking)
    {
        $books = DB::table('bookings')->find($booking->id);
        $bike = Bike::find($booking->bike_id);
        $user = User::find($booking->user_id);
        if (Auth::id() !== $booking->user_id) {
            abort(403, 'Unauthorized action.');
        }


        $dompdf = new Dompdf();
        $html = view('bikes.download', ['bike' => $bike, 'booking' => $books, 'user' => $user])->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('order.pdf');
    }

    function myBookings(User $user)
    {
        if ($user->id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $bookings = Booking::where('user_id', '=', $user->id)->where('rent_status','!=','pending')->get();
        $appointments = Appointment::where('user_id', '=', $user->id)->where('appointment_status','!=','pending')->get();

        return view('bikes.bookings', ['bookings' => $bookings, 'appointments' => $appointments]);
    }

    function bikeReview(Bike $bike, Request $request)
    {
        $request->validate([
            'review' => 'required|max:255',
        ]);

        $review = new Review();
        $review->bike_id = $bike->id;
        $review->user_id = Auth::id();
        $review->review = $request->review;
        $review->save();

        return redirect()->route('bike.details', ['bike' => $bike->id]);
    }

    function search(Request $request)
    {
        if (isset($_GET['query'])) {

            if (strlen($_GET['query']) > 0) {
                // return strlen($_GET['query']);
                $txt = $_GET['query'];
                $bikes = DB::table('bikes')->where('name', 'LIKE', '%' . $txt . '%')->orWhere('description', 'LIKE', '%' . $txt . '%')->get();
                $mechanics = DB::table('mechanics')->where('name', 'LIKE', '%' . $txt . '%')->orWhere('description', 'LIKE', '%' . $txt . '%')->get();

                return view('bikes.search', ['bikes' => $bikes, 'mechanics' => $mechanics]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    function getChatList($to_user)
    {
        // return $to_user;
        $found = ChatMessage::where('from_user', '=', Auth::id())->where('to_user', '=', $to_user)->exists();
        $notFound = ChatMessage::where('from_user', '=', Auth::id())->where('to_user', '=', $to_user)->doesntExist();
        $final = array();

        // return $notFound;
        if ($notFound) {
            // return 'Yooo';
            $new = new ChatMessage();
            $new->from_user = Auth::id();
            $new->to_user = $to_user;
            $new->message = 'hello';

            $new->save();
        }

        $newMessages = ChatMessage::where('from_user', '=', Auth::id())->orderByDesc('created_at')->get();

        foreach ($newMessages as $message) {
            $name = User::where('id', '=', $message->to_user)->value('name');
            $id = User::where('id', '=', $message->to_user)->value('id');

            $final[$name] = $id;
        }
        return view('main.user-chat', ['users' => $final, 'to' => $to_user]);
    }

    function getAccount()
    {
        $user = User::find(Auth::id());
        return view('main.account', ['user' => $user]);
    }

    function updateUser(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'license' => 'required',
            'phone' => 'required|integer|regex:/98[0-9]{8}$/'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'message' => $validator->errors()]);
        }

        $emails = DB::table('users')->pluck('email');
        $emailsArr = array();
        foreach ($emails as $email) {
            if ($email !== $user->email) {
                array_push($emailsArr, $email);
            }
        }
        // return $emailsArr;
        $license = DB::table('users')->pluck('license');
        $lArr = array();
        foreach ($license as $l) {
            if ($l !== $user->lisence) {
                array_push($lArr, $l);
            }
        }
        if ($request->has('name')) {
            if ($request->name !== $user->name) {
                User::where('id', '=', $user->id)->update(['name' => $request->name]);
                
            }
        }

        if ($request->has('email')) {

            if ($request->email != $user->email) {
                if (in_array($request->email, $emailsArr)) {
                    return response()->json(['status' => 'fail', 'message' => 'invalid email']);
                }
            }
            User::where('id', '=', $user->id)->update(['email' => $request->email]);
            
        }

        if ($request->has('license')) {
            if ($request->license !== $user->license) {
                if (in_array($request->license, $lArr)) {
                    return response()->json(['status' => 'fail', 'message' => 'invalid license']);
                }
                
            }
            User::where('id', '=', $user->id)->update(['license' => $request->license]);
            
        }

        if ($request->has('phone')) {
            if ($request->phone != $user->phone) {
                User::where('id', '=', $user->id)->update(['phone' => $request->phone]);
                
            }
        }

        return response()->json(['status' => 'success', 'message'=>'updated successfully']);
    }

    function aboutUs(){
        return view('main.about-us');
    }
}
