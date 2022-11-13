<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Bike;
use App\Models\Booking;
use App\Models\Brand;
use App\Models\ChatMessage;
use App\Models\Mechanic;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic;

class AdminController extends Controller
{
    //
    function bikes(){
        $bikes = Bike::all();
        return view('admin.bikes.all',['bikes'=>$bikes, 'count'=>1]);
    }

    function bikesRequested(){
        $bookings = Booking::where('rent_status', '=', 'requested')->get();
        return view('admin.bookings.requested', ['bookings' => $bookings, 'count' => 1]); 
    }

    function confirmBooking(Booking $booking){
        Booking::where('id','=',$booking->id)->update(['rent_status'=>'confirmed', 'payment_status'=>'paid']);
        return redirect()->route('admin.requested');
    }

    function cancelBooking(Booking $booking){
        Booking::where('id','=',$booking->id)->update(['rent_status'=>'cancelled', 'payment_status' => 'returned']);
        return redirect()->route('admin.requested');
    }

    function getConfirmed(){
        $bookings = Booking::where('rent_status','=','confirmed')->get();
        return view('admin.bookings.confirmed',['bookings'=>$bookings, 'count'=>1]);
    }

    function undoConfirm(Booking $booking){
        Booking::where('id','=',$booking->id)->update(['rent_status'=>'requested','payment_status'=>'unpaid']);
        return redirect()->route('bikes.confirmed');
    }

    function getCancelled(){
        $bookings = Booking::where('rent_status','=','cancelled')->get();
        // return $bookings;
        return view('admin.bookings.cancelled',['bookings'=>$bookings, 'count'=>1]);
    }

    function undoCancel(Booking $booking){
        Booking::where('id','=',$booking->id)->update(['rent_status'=>'requested','payment_status'=>'unpaid']);
        return redirect()->route('bikes.cancelled');
    }

    function allBookings(){
        $bookings = Booking::all();
        $total = Booking::all()->count();
        $requested = Booking::where('rent_status','=','requested')->count();
        $confirmed = Booking::where('rent_status','=','confirmed')->count();
        $cancelled = Booking::where('rent_status','=','cancelled')->count();
        return view('admin.bookings.all', ['bookings'=>$bookings, 'count' => 1, 'total'=>$total, 'requested'=>$requested, 'confirmed'=>$confirmed, 'cancelled'=>$cancelled]);
    }

    function deletebooking(Booking $booking){
        Booking::where('id','=',$booking->id)->delete();
        return redirect()->route('admin.allBookings');
    }


    function bikeAddForm(){
        $brands = Brand::all();
        return view('admin.bikes.add', ['brands'=>$brands]);
    }


    function storebike(Request $request){
        // return $request;
        $request->validate([
            'bikename' => 'required|max:60',
            'desc' => 'required|max:250',
            'price' => 'required|integer|min:30',
            'brand' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'pics' => 'required',
            'pics.*'=> 'mimes:png,jpg,jpeg'
            
        ]);

        $bike = new Bike();

        $bike->name = $request->bikename;
        $bike->description = $request->desc;
        $bike->priceperday = $request->price;
        $bike->brand_id = $request->brand;
        $bike->img1 = '';
        $bike->img2 = '';
        $bike->img3 = '';

        if($request->hasFile('thumbnail')){

            $f = $request->file('thumbnail');

            $fname = $f->getClientOriginalName();
            $ext = pathinfo($fname, PATHINFO_EXTENSION);
            $name = pathinfo($fname, PATHINFO_FILENAME);

            $newName = str_replace(' ', '-',$name) . time() . '.' . $ext;
            // $n = '/public/bikes/' . $newName;
            // return $n;
            $img =  ImageManagerStatic::make($f);
            $img->resize(190, 73);
            $img->save('storage/bikes/'.$newName);
            // $f->storeAs('/public/bikes', $newName);

            $bike->thumbnail = $newName;
        }

        if($request->hasFile('pics')){
            // dd($request->pics);

            $fileNames = '';
            $files = $request->file('pics');
            
            $count = count($files);

            for ($i = 0; $i < $count; $i++) {
                $f = $files[$i]->getClientOriginalName();
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                $name = pathinfo($f, PATHINFO_FILENAME);
                $fname = str_replace(' ', '-',$name) . time() . '.' . $ext;
                $files[$i]->storeAs('/public/bikes', $fname);
                $fileNames .= $fname . ',';
            }
            
            $bike->images = $fileNames;
        }

        $bike->save();
        return redirect()->route('admin.bikes');
        
    }

    function getSingleBike(Bike $bike){
        $brands = Brand::all();
        return view('admin.bikes.update',['bike'=>$bike, 'brands'=>$brands]);
    }

    function updateBike(Bike $bike, Request $request){
        $request->validate([
            'bikename' => 'required|max:60',
            'desc' => 'required|max:250',
            'price' => 'required|integer|min:30',
            
            'thumbnail' => 'mimes:png,jpg,jpeg',
            
            'pics.*'=> 'mimes:png,jpg,jpeg'
        ]);

        $bikeFind = Bike::find($bike->id);
        $bikeFind->touch();
        if($request->has('bikename')){
            Bike::where('id','=',$bike->id)->update(['name'=>$request->bikename]);
        }
        if($request->has('desc')){
            Bike::where('id','=',$bike->id)->update(['description'=>$request->desc]);
        }
        if($request->has('price')){
            Bike::where('id','=',$bike->id)->update(['priceperday'=>$request->price]);
        }
        if($request->has('brand')){
            Bike::where('id','=',$bike->id)->update(['brand_id'=>$request->brand]);
        }

        if($request->hasFile('thumbnail')){

            $f = $request->file('thumbnail');

            $fname = $f->getClientOriginalName();
            $ext = pathinfo($fname, PATHINFO_EXTENSION);
            $name = pathinfo($fname, PATHINFO_FILENAME);

            $newName = str_replace(' ', '-',$name) . time() . '.' . $ext;
            // $n = '/public/bikes/' . $newName;
            // return $n;
            $img =  ImageManagerStatic::make($f);
            $img->resize(190, 73);
            $img->save('storage/bikes/'.$newName);
            // $f->storeAs('/public/bikes', $newName);

            Bike::where('id','=',$bike->id)->update(['thumbnail'=> $newName]);
            
        }

        if($request->hasFile('pics')){
            // dd($request->pics);

            $fileNames = '';
            $files = $request->file('pics');
            
            $count = count($files);

            for ($i = 0; $i < $count; $i++) {
                $f = $files[$i]->getClientOriginalName();
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                $name = pathinfo($f, PATHINFO_FILENAME);
                $fname = str_replace(' ', '-',$name) . time() . '.' . $ext;
                $files[$i]->storeAs('/public/bikes', $fname);
                $fileNames .= $fname . ',';
            }
            
            Bike::where('id','=',$bike->id)->update(['images'=> $fileNames]);

        }
        return redirect()->route('admin.bikes');        
    }

    function removeBike(Bike $bike){
        $findBike = Bike::find($bike->id);
        if($findBike){
            Bike::where('id','=',$bike->id)->delete();
            return redirect()->route('admin.bikes');
        }
        return back()->with('error','Bike Not Found');
    }


    function getBrands(){
        $brands = Brand::all();
        
        return view('admin.brands.all',['brands'=>$brands, 'count'=>1]);
    }

    function addBrand(){
        return view('admin.brands.add');
    }

    function storeBrand(Request $request){
        $request->validate(['brandname'=>'required']);

        $brand = new Brand();
        $brand->name = $request->brandname;
        $brand->save();
        return redirect()->route('admin.allBrands');
    }

    function getSingleBrand(Brand $brand){
        return view('admin.brands.update', ['brand'=>$brand]);
    }

    function updateBrand(Brand $brand, Request $request){
        $request->validate(['brandname'=>'required']);

        if($request->has('brandname')){
            Brand::where('id','=',$brand->id)->update(['name'=>$request->brandname]);
            return redirect()->route('admin.allBrands');
        }
    }

    function removeBrand(Brand $brand){
        $findBrand = Brand::find($brand->id);
        if($findBrand){
            Brand::where('id','=',$brand->id)->delete();
            return redirect()->route('admin.allBrands');
        }
        return back()->with('error','Brand Not Found');
    }

    function getReviews(){
        $reviews = Review::all();
        return view('admin.reviews.all',['reviews'=>$reviews, 'count'=>1]);
    }

    function removeReview(Review $review){
        $findReview = Review::find($review->id);
        if($findReview){
            Review::where('id','=',$review->id)->delete();
            return redirect()->route('admin.allReviews');
        }
        return back()->with('error','Brand Not Found');
    }

    function getUsers(){
        $users = User::where('user_type','=','user')->get();
        return view('admin.users.all',['users'=>$users,'count'=>1]);

    }

    function removeUser(User $user){
        $findUser = User::find($user->id);
        if($findUser){
            Booking::where('user_id','=',$user->id)->delete();
            Appointment::where('user_id','=',$user->id)->delete();
            ChatMessage::where('from_user','=',$user->id)->delete();
            ChatMessage::where('to_user','=',$user->id)->delete();
            Review::where('user_id','=',$user->id)->delete();
            User::where('id','=',$user->id)->delete();
            return redirect()->route('admin.allUsers');
        }
        return back()->with('error','User Not Found');
    }

    function getMechanics(){
        $mechanics =  Mechanic::all();
        return view('admin.mechanics.all',['mechanics'=>$mechanics, 'count'=>1]);
    }

    function addMechanic(){
        return view('admin.mechanics.add');
    }

    function storeMechanic(Request $request){
        $request->validate([
            'mechname' => 'required|max:60',
            'desc' => 'required|max:90',
            'price' => 'required|integer|min:50',
            'experience' => 'required|max:30',
            'phone' => 'required',
            'email' =>'required|unique:users',
            'password' => 'required|min:8',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'pics' => 'required',
            'pics.*'=> 'mimes:png,jpg,jpeg'
        ]);

        $user = new User();

        $user->name = $request->mechname;
        $user->email = $request->email;
        $user->license = '';
        $user->phone = $request->phone;
        $user->user_type = 'mechanic';
        $user->password = Hash::make($request->password);
        $user->save();

        $mechanic = new Mechanic();

        $mechanic->user_id = $user->id;
        $mechanic->name = $request->mechname;
        $mechanic->description = $request->desc;
        $mechanic->experience = $request->experience;
        $mechanic->price = $request->price;

        $mechanic->img1 = '';
        $mechanic->img2 = '';
        $mechanic->img3 = '';


        if($request->hasFile('thumbnail')){

            $f = $request->file('thumbnail');

            $fname = $f->getClientOriginalName();
            $ext = pathinfo($fname, PATHINFO_EXTENSION);
            $name = pathinfo($fname, PATHINFO_FILENAME);

            $newName = str_replace(' ', '-',$name) . time() . '.' . $ext;
            // $n = '/public/bikes/' . $newName;
            // return $n;
            $img =  ImageManagerStatic::make($f);
            $img->resize(190, 73);
            $img->save('storage/mechanics/'.$newName);
            // $f->storeAs('/public/bikes', $newName);

            $mechanic->thumbnail = $newName;
        }

        if($request->hasFile('pics')){
            // dd($request->pics);

            $fileNames = '';
            $files = $request->file('pics');
            
            $count = count($files);

            for ($i = 0; $i < $count; $i++) {
                $f = $files[$i]->getClientOriginalName();
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                $name = pathinfo($f, PATHINFO_FILENAME);
                $fname = str_replace(' ', '-',$name) . time() . '.' . $ext;
                $files[$i]->storeAs('/public/mechanics', $fname);
                $fileNames .= $fname . ',';
            }
            
            $mechanic->images = $fileNames;
        }

        $mechanic->save();
        return redirect()->route('admin.allMech');



    }

    function getSingleMechanic(Mechanic $mechanic){
        return view('admin.mechanics.update',['mechanic'=>$mechanic]);
    }

    function updateMechanic(Mechanic $mechanic, Request $request){
        $request->validate([
            'mechname' => 'required|max:60',
            'desc' => 'required|max:90',
            'price' => 'required|integer|min:50',
            'experience' => 'required|max:30',
            'phone' => 'required',
            
            'thumbnail' => 'mimes:png,jpg,jpeg',
            
            'pics.*'=> 'mimes:png,jpg,jpeg'
        ]);

        $findMech = Mechanic::find($mechanic->id);
        $findMech->touch();
        $user_id = Mechanic::where('id','=',$mechanic->id)->value('user_id');
        

        if($request->has('mechname')){
            Mechanic::where('id','=',$mechanic->id)->update(['name'=>$request->mechname]);
            User::where('id','=',$user_id)->update(['name'=>$request->mechname]);
        }
        
        if($request->has('desc')){
            Mechanic::where('id','=',$mechanic->id)->update(['description'=>$request->desc]);
        }

        if($request->has('price')){
            Mechanic::where('id','=',$mechanic->id)->update(['price'=>$request->price]);
        }

        if($request->has('experience')){
            Mechanic::where('id','=',$mechanic->id)->update(['experience'=>$request->experience]);
        }

        if($request->has('phone')){
            User::where('id','=',$user_id)->update(['phone'=>$request->phone]);
        }

        if($request->hasFile('thumbnail')){

            $f = $request->file('thumbnail');

            $fname = $f->getClientOriginalName();
            $ext = pathinfo($fname, PATHINFO_EXTENSION);
            $name = pathinfo($fname, PATHINFO_FILENAME);

            $newName = str_replace(' ', '-',$name) . time() . '.' . $ext;
            // $n = '/public/bikes/' . $newName;
            // return $n;
            $img =  ImageManagerStatic::make($f);
            $img->resize(190, 73);
            $img->save('storage/mechanics/'.$newName);
            // $f->storeAs('/public/bikes', $newName);

            Mechanic::where('id','=',$mechanic->id)->update(['thumbnail'=>$newName]);
            
        }

        if($request->hasFile('pics')){
            // dd($request->pics);

            $fileNames = '';
            $files = $request->file('pics');
            
            $count = count($files);

            for ($i = 0; $i < $count; $i++) {
                $f = $files[$i]->getClientOriginalName();
                $ext = pathinfo($f, PATHINFO_EXTENSION);
                $name = pathinfo($f, PATHINFO_FILENAME);
                $fname = str_replace(' ', '-',$name) . time() . '.' . $ext;
                $files[$i]->storeAs('/public/mechanics', $fname);
                $fileNames .= $fname . ',';
            }
            
            Mechanic::where('id','=',$mechanic->id)->update(['images'=>$fileNames]);
            
        }

        return redirect()->route('admin.allMech');
        
    }

    function removeMechanic(Mechanic $mechanic){
        $findMech = Mechanic::find($mechanic->id);
        $user_id = Mechanic::where('id','=',$mechanic->id)->value('user_id');
        
        if($findMech){
            Mechanic::where('id','=',$mechanic->id)->delete();
            User::where('id','=',$user_id)->delete();
            return redirect()->route('admin.allMech');
        }
        return back()->with('error','Mechanic Not Found');
    }
}
