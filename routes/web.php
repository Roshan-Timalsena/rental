<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BikeRentController;
use App\Http\Controllers\KhaltiController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\MechanicsController;
use App\Models\Bike;
use App\Models\Mechanic;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if(Auth::check()){
        if(Auth::user()->user_type == 'user'){
            $bikes = Bike::all()->random(2);
            $mechanics = Mechanic::all()->random(2);
            return view('main.home', ['bikes' => $bikes, 'mechanics'=> $mechanics]);
        }
        if(Auth::user()->user_type == 'admin'){
            return redirect()->route('admin.home');
        }
        if(Auth::user()->user_type == 'mechanic'){
            $id = Mechanic::where('user_id','=',Auth::id())->value('id');
            return redirect()->route('mech.requested',['mechanic'=>$id]);
        }
    } else{
        $bikes = Bike::all()->random(2);
        $mechanics = Mechanic::all()->random(2);
        return view('main.home', ['bikes' => $bikes, 'mechanics'=> $mechanics]);
    }  
})->name('user.home');

Route::get('/home', function (){
    return redirect('/');
});

Auth::routes();

Route::get('/bike/all',[BikeRentController::class, 'bikeAll'])->name('bike.all');
Route::get('/bike/details/{bike:id}',[BikeRentController::class, 'bikeSingle'])->name('bike.details');
Route::get('/rent-now/{bike:id}', [BikeRentController::class, 'index'])->middleware('auth')->name('bike.rentnow');
Route::post('/rent-now/{bike:id}/bike', [BikeRentController::class, 'rentNow'])->middleware(['auth'])->name('bike.rent');
Route::get('/bike/rent/{bike:id}/done/{user}',[BikeRentController::class, 'rentDone'])->middleware(['auth'])->name('bike.rentDone');

Route::post('/bike/rent-done/{booking:id}', [BikeRentController::class, 'rentUpdate'])->middleware(['auth'])->name('bike.rentUpdate');
Route::post('/khalticonfirm', [KhaltiController::class, 'confirmKhalti'])->middleware(['auth'])->name('confirmKhalti');


Route::get('/bike/rent-done/{booking:id}', [BikeRentController::class, 'showBooking'])->middleware(['auth'])->name('bike.showRent');
Route::get('/download/order/{booking:id}',[BikeRentController::class, 'downloadOrder'])->middleware(['auth'])->name('bike.downloadOrder');
Route::get('/my-bookings/{user:id}',[BikeRentController::class, 'myBookings'])->middleware(['auth'])->name('bookings');
Route::post('/review/bike/{bike:id}', [BikeRentController::class, 'bikeReview'])->middleware(['auth'])->name('bike.review');
Route::get('/search',[BikeRentController::class, 'search'])->name('search');

Route::get('/mechanic/all',[MechanicsController::class, 'mechanicsAll'])->name('mech.all');
Route::get('/mechanic/details/{mechanic:id}', [MechanicsController::class, 'mechanicSingle'])->name('mech.single');
Route::post('/mechanic/book/{mechanic:id}',[MechanicsController::class, 'mechanicAppoint'])->middleware('auth')->name('mech.appoint');
Route::get('/mechanic/checkout/{appointment:id}', [MechanicsController::class, 'mechanicCheckout'])->middleware(['auth'])->name('mech.checkout');
Route::post('/mechanic/checkout/done/{appointment:id}', [MechanicsController::class, 'updateAppointment'])->middleware(['auth'])->name('mech.update');
Route::get('/mechanic/checkout/done/{appointment:id}', [MechanicsController::class, 'showAppointment'])->middleware(['auth'])->name('mech.show');
Route::get('/mechanics/download/{appointment:id}',[MechanicsController::class, 'downloadAppointment'])->middleware(['auth'])->name('mech.download');


Route::get('/admin', function(){
    return redirect()->route('admin.requested');
})->name('admin.home');


Route::get('/admin/bikes/requested',[AdminController::class, 'bikesRequested'])->middleware(['auth','is_admin'])->name('admin.requested');
Route::get('/admin/bikes/booking/confirm/{booking:id}',[AdminController::class, 'confirmBooking'])->middleware(['auth','is_admin'])->name('admin.confirm');
Route::get('/admin/bikes/booking/cancel/{booking:id}',[AdminController::class, 'cancelBooking'])->middleware(['auth','is_admin'])->name('admin.cancel');
Route::get('/admin/bikes/confirmed', [AdminController::class, 'getConfirmed'])->middleware(['auth','is_admin'])->name('bikes.confirmed');
Route::get('/admin/bikes/confirmed/undo/{booking:id}', [AdminController::class, 'undoConfirm'])->middleware(['auth','is_admin'])->name('bikes.undoConfirmed');
Route::get('/admin/bikes/cancelled', [AdminController::class, 'getCancelled'])->middleware(['auth','is_admin'])->name('bikes.cancelled');
Route::get('/admin/bikes/cancelled/undo/{booking:id}', [AdminController::class, 'undoCancel'])->middleware(['auth','is_admin'])->name('bikes.undoCancel');
Route::get('/admin/bikes/bookings/all',[AdminController::class, 'allBookings'])->middleware(['auth', 'is_admin'])->name('admin.allBookings');
Route::get('/admin/booking/delete/{booking:id}',[AdminController::class, 'deletebooking'])->middleware(['auth','is_admin'])->name('booking.delete');

Route::get('/admin/bikes', [AdminController::class, 'bikes'])->middleware(['auth','is_admin'])->name('admin.bikes');
Route::get('/admin/bikes/add', [AdminController::class, 'bikeAddForm'])->middleware(['auth','is_admin'])->name('admin.addBike');

// Route::get('/image', function() {
    
//     $img =  ImageManagerStatic::make('bc2.jpg')->resize(190, 73);
//     return $img->response('png');
// });

// Route::post('/admin/bikes/drop', [AdminController::class, 'bikesDrop'])->name('drop.bikes');
Route::post('/admin/bikes/store',[AdminController::class, 'storebike'])->middleware(['auth','is_admin'])->name('admin.storebike');
Route::get('/admin/bike/update/{bike:id}',[AdminController::class, 'getSingleBike'])->middleware(['auth','is_admin'])->name('admin.getSingleBike');
Route::post('/admin/bike/update/{bike:id}',[AdminController::class, 'updateBike'])->middleware(['auth','is_admin'])->name('admin.updateBike');
Route::get('/admin/bike/remove/{bike:id}', [AdminController::class, 'removeBike'])->middleware(['auth','is_admin'])->name('admin.removeBike');


//for brands
Route::get('/admin/brands',[AdminController::class, 'getBrands'])->middleware(['auth','is_admin'])->name('admin.allBrands');
Route::get('/admin/brand/add',[AdminController::class, 'addBrand'])->middleware(['auth','is_admin'])->name('admin.addBrand');
Route::post('/admin/brand/store',[AdminController::class, 'storeBrand'])->middleware(['auth','is_admin'])->name('admin.storeBrand');
Route::get('/admin/brand/update/{brand:id}',[AdminController::class, 'getSingleBrand'])->middleware(['auth','is_admin'])->name('admin.singleBrand');
Route::post('/admin/brand/update/{brand:id}',[AdminController::class, 'updateBrand'])->middleware(['auth','is_admin'])->name('admin.updateBrand');
Route::get('/admin/brand/remove/{brand:id}',[AdminController::class, 'removeBrand'])->middleware(['auth','is_admin'])->name('admin.removeBrand');

//for reviews
Route::get('/admin/reviews',[AdminController::class, 'getReviews'])->middleware(['auth','is_admin'])->name('admin.allReviews');
Route::get('/admin/review/remove/{review:id}',[AdminController::class, 'removeReview'])->middleware(['auth','is_admin'])->name('admin.removeReview');

//for users
Route::get('/admin/users',[AdminController::class, 'getUsers'])->middleware(['auth','is_admin'])->name('admin.allUsers');
Route::get('/admin/user/remove/{user:id}',[AdminController::class, 'removeUser'])->middleware(['auth','is_admin'])->name('admin.removeUser');

//for mechanics
Route::get('/admin/mechanics',[AdminController::class, 'getMechanics'])->middleware(['auth','is_admin'])->name('admin.allMech');
Route::get('/admin/mechanic/add',[AdminController::class, 'addMechanic'])->middleware(['auth','is_admin'])->name('admin.addMech');
Route::post('/admin/mechanic/store',[AdminController::class, 'storeMechanic'])->middleware(['auth','is_admin'])->name('admin.storeMech');
Route::get('/admin/mechanic/update/{mechanic:id}',[AdminController::class, 'getSingleMechanic'])->middleware(['auth','is_admin'])->name('admin.singleMech');
Route::post('/admin/mechanic/update/{mechanic:id}',[AdminController::class, 'updateMechanic'])->middleware(['auth','is_admin'])->name('admin.updateMech');
Route::get('/admin/mechanic/remove/{mechanic:id}',[AdminController::class, 'removeMechanic'])->middleware(['auth','is_admin'])->name('admin.removeMech');

//Mechanic's Appointment
Route::get('/mechanic/appointment/requested/{mechanic:id}',[MechanicController::class, 'requested'])->middleware(['auth','is_mechanic'])->name('mech.requested');
Route::get('/mechanic/appointment/confirm/{appointment:id}',[MechanicController::class, 'confirm'])->middleware(['auth','is_mechanic'])->name('mech.confirm');
Route::get('/mechanic/appointment/cancel/{appointment:id}',[MechanicController::class, 'cancel'])->middleware(['auth','is_mechanic'])->name('mech.cancel');

Route::get('/mechanic/appointment/confirmed/{mechanic:id}',[MechanicController::class, 'getConfirmed'])->middleware(['auth','is_mechanic'])->name('mech.getConfirmed');
Route::get('/mechanic/appointment/confirmed/undo/{appointment:id}',[MechanicController::class, 'undoConfirmed'])->middleware(['auth','is_mechanic'])->name('mech.undoConfirmed');

Route::get('/mechanic/appointment/cancelled/{mechanic:id}',[MechanicController::class, 'gettCancelled'])->middleware(['auth','is_mechanic'])->name('mech.getCancelled');
Route::get('/mechanic/appointment/cancelled/undo/{appointment:id}',[MechanicController::class, 'undoCancel'])->middleware(['auth','is_mechanic'])->name('mech.undoCancel');

Route::get('/mechanic/appointment/all/{mechanic:id}',[MechanicController::class, 'getAll'])->middleware(['auth','is_mechanic'])->name('mech.getAll');
Route::get('/mechanic/appointent/remove/{appointment:id}',[MechanicController::class, 'remove'])->middleware(['auth','is_mechanic'])->name('mech.remove');

Route::get('/mechanic/chat',[MechanicController::class, 'mechMessages'])->middleware(['auth','is_mechanic'])->name('mech.messages');

Route::get('/user/chat', function(){
    return view('main.user-chat');
})->middleware(['auth']);

Route::get('/get/messages/{id}',[MechanicController::class, 'getMessages']);


Route::get('/user/chat/{id}',[BikeRentController::class, 'getChatList'])->middleware(['auth'])->name('user.chatList');

Route::post('/message/send/{id}', [MechanicController::class, 'sendMessage']);

Route::get('/user/account',[BikeRentController::class, 'getAccount'])->middleware(['auth'])->name('user.account');

Route::post('/user/account/update/{user:id}', [BikeRentController::class, 'updateUser'])->middleware('auth')->name('user.update');

Route::get('/about',[BikeRentController::class, 'aboutUs'])->name('aboutUs');