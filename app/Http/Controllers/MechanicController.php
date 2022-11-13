<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ChatMessage;
use App\Models\Mechanic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class MechanicController extends Controller
{
    //
    function requested(Mechanic $mechanic){
        $appointments = Appointment::where('mechanic_id', '=',$mechanic->id)->where('appointment_status','=','requested')->get();
        return view('mech.appointments.requested', ['appointments'=>$appointments, 'name'=>$mechanic->name, 'mechanic'=>$mechanic->id, 'count'=>1]);
    }

    function confirm(Appointment $appointment){
        // $id = Auth::id();
        $mechanic = Mechanic::where('user_id','=',Auth::id())->value('id');
        $find = Appointment::where('mechanic_id','=',$mechanic)->get();
        if($find){
            Appointment::where('id','=',$appointment->id)->update(['appointment_status'=>'confirmed','payment_status'=>'paid']);
            return redirect()->route('mech.requested',['mechanic'=>$mechanic]);
        }
    }

    function cancel(Appointment $appointment){
        $mechanic = Mechanic::where('user_id','=',Auth::id())->value('id');
        $find = Appointment::where('mechanic_id','=',$mechanic)->get();
        if($find){
            Appointment::where('id','=',$appointment->id)->update(['appointment_status'=>'cancelled','payment_status'=>'cancelled']);
            return redirect()->route('mech.requested',['mechanic'=>$mechanic]);
        }
    }

    function getConfirmed(Mechanic $mechanic){
        $appointments = Appointment::where('mechanic_id', '=',$mechanic->id)->where('appointment_status','=','confirmed')->get();
        return view('mech.appointments.confirmed', ['appointments'=>$appointments, 'name'=>$mechanic->name, 'mechanic'=>$mechanic->id, 'count'=>1]);
    }

    function undoConfirmed(Appointment $appointment){
        $mechanic = Mechanic::where('user_id','=',Auth::id())->value('id');
        $find = Appointment::where('mechanic_id','=',$mechanic)->where('id','=',$appointment->id)->where('appointment_status','=','confirmed')->get();
        if($find){
            Appointment::where('id','=',$appointment->id)->update(['appointment_status'=>'requested','payment_status'=>'unpaid']);
            return redirect()->route('mech.requested',['mechanic'=>$mechanic]);
        }
    }

    function gettCancelled(Mechanic $mechanic){
        $appointments = Appointment::where('mechanic_id', '=',$mechanic->id)->where('appointment_status','=','cancelled')->get();
        return view('mech.appointments.cancelled', ['appointments'=>$appointments, 'name'=>$mechanic->name, 'mechanic'=>$mechanic->id, 'count'=>1]);
    }

    function undoCancel(Appointment $appointment){
        $mechanic = Mechanic::where('user_id','=',Auth::id())->value('id');
        $find = Appointment::where('mechanic_id','=',$mechanic)->where('id','=',$appointment->id)->where('appointment_status','=','cancelled')->get();
        if($find){
            Appointment::where('id','=',$appointment->id)->update(['appointment_status'=>'requested','payment_status'=>'unpaid']);
            return redirect()->route('mech.requested',['mechanic'=>$mechanic]);
        }
    }

    function getAll(Mechanic $mechanic){
        $appointments = Appointment::where('mechanic_id','=',$mechanic->id)->get();
        return view('mech.appointments.all', ['appointments'=>$appointments, 'name'=>$mechanic->name, 'mechanic'=>$mechanic->id, 'count'=>1]);
        
    }

    function remove(Appointment $appointment){
        $mechanic = Mechanic::where('user_id','=',Auth::id())->value('id');
        $find = Appointment::where('mechanic_id','=',$mechanic)->where('id','=',$appointment->id)->get();
        if($find){
            Appointment::where('id','=',$appointment->id)->delete();
            return redirect()->route('mech.requested',['mechanic'=>$mechanic]);
        }
    }

    function mechMessages(){
        $mechanic = Mechanic::where('user_id','=',Auth::id())->value('id');
        $my_id = Auth::id();
        $m1 = ChatMessage::where('from_user','=',$my_id)->get();

        $m2 = ChatMessage::where('to_user', '=', $my_id)->get();
        
        $final = array();
        foreach($m1 as $m3){
            $name = User::where('id','=',$m3->to_user)->value('name');
            $id = User::where('id','=',$m3->to_user)->value('id');
            
            $final[$name] = $id;
        }

        foreach($m2 as $m4){
            $name = User::where('id','=',$m4->from_user)->value('name');
            $id = User::where('id','=',$m4->from_user)->value('id');
            
            $final[$name] = $id;
        }
        
        
        return view('mech.chat',['users'=>$final,'mechanic'=>$mechanic]);
    }

    function getMessages($user_id){
        $my_id = Auth::id();
        $to_user = User::where('id','=',$user_id)->value('name');
        $from_user = User::where('id','=',$my_id)->value('name');
        
        // return view('mech.chat-area', ['name'=>$name, 'messages'=>$mess]);

        $messages = ChatMessage::where(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $user_id)->where('to_user', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from_user', $my_id)->where('to_user', $user_id);
        })->get();

        return view('mech.chat-area', ['from_user'=>$from_user,'to_user'=>$to_user, 'messages'=>$messages]);
    }

    
    function sendMessage($to_user, Request $request){
        $cuser = Auth::id();

        $request->validate(['message' => 'required']);

        $data = new ChatMessage();

        $data->from_user = $cuser;
        $data->to_user = $to_user;
        $data->message = $request->message;

        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $cuser, 'to' => $to_user];
        $pusher->trigger('my-channel', 'my-event', $data);
    }
    
}
