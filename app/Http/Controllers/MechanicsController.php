<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Mechanic;
use App\Rules\DateRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use App\Models\Bike;
use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use DateTime;
use Illuminate\Support\Facades\Validator;


class MechanicsController extends Controller
{
    //

    function mechanicSingle(Mechanic $mechanic){
        $otherMechanics = Mechanic::where('id','!=',$mechanic->id)->limit(3)->get();
        return view('mechanics.mechanic-single',['mechanic'=>$mechanic, 'otherMecahnics'=>$otherMechanics]);
    }

    function mechanicsAll(){
        $mechanics = Mechanic::paginate(2);
        $count = $mechanics->count();
        $all = Mechanic::all()->count();

        return view('mechanics.mechanics-all',['mechanics'=>$mechanics, 'count'=>$count, 'all'=>$all]);

    }

    function mechanicAppoint(Mechanic $mechanic, Request $request){
        $user = Auth::id();

        $user_type = Auth::user()->user_type;

        if($user_type !== 'user'){
            abort(403, 'You Cannot Perform This Action');
        }

        $request->validate([
            'date' => ['required', new DateRule()],
            'info' => 'nullable|max:255'
        ]);

        $appointment = new Appointment();

        $appointment->mechanic_id = $mechanic->id;
        $appointment->user_id = $user;
        $appointment->date = $request->date;
        $appointment->message = $request->info;
        $appointment->appointment_status = 'pending';
        $appointment->payment_method = '';
        $appointment->payment_status = '';

        $appointment->save();

        $id = $appointment->id;

        return redirect()->route('mech.checkout',['appointment'=>$id]);
    }

    function mechanicCheckout(Appointment $appointment){
        
        if($appointment->user_id !== Auth::id()){
            abort(403, 'Unauthorized action.');
        }

        $user = Auth::id();

        $exists = DB::table('appointments')->where('user_id','=', $user)->where('mechanic_id', '=', $appointment->mechanic_id)->where('appointment_status','=','pending')->first();
        if($exists){
            return view('mechanics.mechanic-checkout',[ 'appointment'=>$appointment]);

        } else{
            abort(403, 'Unauthorized action.');
        }
    }

    function updateAppointment(Appointment $appointment, Request $request){
        $exists = DB::table('appointments')->find($appointment->id);
        $finds = Appointment::find($appointment->id);

        if(Auth::id() !== $appointment->user_id){
            abort(403, 'Unauthorizeed Action.');
        }

        $finds->touch();

        if($exists){
            $request->validate([
                'ratio' => 'required'
            ]);

            if($request->ratio == 'poa'){
                Appointment::where('id','=',$appointment->id)->update(['appointment_status'=>'requested','payment_method'=>'payment on arrival','payment_status'=>'unpaid']);
                $link = 'http://127.0.0.1:8000/mechanic/checkout/done/' . $appointment->id;
                return response()->json(['message' => 'poa', 'link' => $link]);
            }
            if($request->ratio == 'khalti'){
                // Appointment::where('id','=',$appointment->id)->update(['appointment_status'=>'requested','payment_method'=>'payment on arrival','payment_status'=>'unpaid']);
                session(['khaltiamount' => $appointment->mechanic->price, 'appointment' => $appointment->id]);
                return response()->json(['method' => 'khalti', 'amount' => $appointment->mechanic->price * 100]);
            }

            return view('mechanics.done', ['appointment'=>$appointment]);
        }else{
            abort(403, 'Unauthorized Action.');
        }

    }

    function showAppointment(Appointment $appointment){
        $books = DB::table('appointments')->find($appointment->id);
        
        if(Auth::id() !== $appointment->user_id){
            abort(403, 'Unauthorized action.');
        }
        return view('mechanics.done',['appointment'=>$appointment]);
    }

    function downloadAppointment(Appointment $appointment){
        $books = DB::table('appointments')->find($appointment->id);

        if(Auth::id() !== $appointment->user_id){
            abort(403, 'Unauthorized action.');
        }
        
        $dompdf = new Dompdf();
        $html = view('mechanics.mech-download',['appointment'=>$appointment])->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('appointment.pdf');

    }

    
}
