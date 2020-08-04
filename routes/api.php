<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\House;
use App\Category;
use App\User;
use App\Admin;
use App\Reservation;
use App\Message;
use App\Comment;
use App\Propriete;
use App\Valuecatpropriete;

Route::post('auth/register', 'AuthenticateController@register');
Route::post('auth/login', 'AuthenticateController@login');
Route::get('logout', 'AuthenticateController@logout');
Route::group(['middleware' => 'jwt.auth'], function () {
	Route::get('user', 'AuthenticateController@getAuthUser');
});
Route::group(['middleware' => 'cors'], function () {
	Route::post('/addComment', function(Request $request){
		$comment = new Comment();
		$comment->comment = $request->comment;
		$comment->note = $request->note;
		$comment->user_id = $request->user_id;
		$comment->admin_id = 0;
		$comment->house_id = $request->house_id;
		$comment->save();
        return Response::json(['data' => 'added successfully'],200);
	});
});

Route::get('/mylocations/{id}', function ($id) {
	$houseProfil = house::with('proprietes', 'valuecatproprietes', 'category', 'user')->where('user_id', $id)->get()->toJson();
 	return response($houseProfil,200)->header('Content-Type', 'application/json');
});

Route::get('/user/reservations/{id}', function ($id) {
	$today = Date::today()->format('Y-m-d');
	$reservationProfil = reservation::with('house', 'proprietes', 'valuecatproprietes', 'category', 'user')
	->where('user_id', $id)
	->where('end_date', '>=', $today)
	->where('reserved', '=', 1)->get()->toJson();
	// $reservationProfil = DB::table('reservations')
    //             ->join('houses', 'houses.id', '=', 'reservations.house_id')
	// 			->join('users', 'users.id', '=', 'reservations.user_id')
	// 			->join('categories', 'categories.id', '=', 'reservations.category_id')
	// 			->join('valuecatproprietes', 'valuecatproprietes.house_id', '=', 'houses.id')
	// 			->join('proprietes', 'proprietes.id', '=', 'valuecatproprietes.propriete_id')
	// 			->select('categories.*','reservations.*','houses.*','users.*', 'proprietes.*')
	// 			->where('reservations.user_id', $id)
	// 			->where('reservations.end_date', '>=', $today)
	// 			->where('reservations.reserved', '=', 1)->get()->toJson();
 	return response($reservationProfil,200)->header('Content-Type', 'application/json');
});

Route::get('user/allreservationsnonannulees/{id}', function ($id) {
	$today = Date::today()->format('Y-m-d');
	$reservationProfil = reservation::with('house', 'proprietes', 'valuecatproprietes', 'category', 'user')
	->where('user_id', $id)
	->get()->toJson();
	// $reservationProfil = DB::table('reservations')
    //             ->join('houses', 'houses.id', '=', 'reservations.house_id')
	// 			->join('users', 'users.id', '=', 'reservations.user_id')
	// 			->join('categories', 'categories.id', '=', 'reservations.category_id')
	// 			->join('valuecatproprietes', 'valuecatproprietes.house_id', '=', 'houses.id')
	// 			->join('proprietes', 'proprietes.id', '=', 'valuecatproprietes.propriete_id')
	// 			->select('categories.*','reservations.*','houses.*','users.*', 'proprietes.*')
	// 			->where('reservations.user_id', $id)
	// 			->where('reservations.end_date', '>=', $today)
	// 			->where('reservations.reserved', '=', 1)->get()->toJson();
 	return response($reservationProfil,200)->header('Content-Type', 'application/json');
});


Route::get('/user/reservationspassees/{id}', function ($id) {
	$today = Date::today()->format('Y-m-d');
	$reservationProfil = reservation::with('house', 'category', 'user')->where('user_id', $id)
	->where('start_date', '<', $today)
	->where('end_date','<', $today)->get()->toJson();
 	return response($reservationProfil,200)->header('Content-Type', 'application/json');
});

Route::get('/user/reservationsannulees/{id}', function ($id) {
	$today = Date::today()->format('Y-m-d');
	$reservationProfil = reservation::with('house', 'category', 'user')->where('user_id', $id)->where('reserved','=', 0)->get()->toJson();
 	return response($reservationProfil,200)->header('Content-Type', 'application/json');
});

Route::post('/user/comment', function ($id) {
	$commentProfil = reservation::with('house', 'user')->where('user_id', $id)->get()->toJson();
 	return response($commentProfil,200)->header('Content-Type', 'application/json');
});

Route::get('/user/comments/{id}', function ($id) {
	$commentProfil = comment::with('house', 'user')->where('user_id', $id)->orderBy('id','desc')->get()->toJson();
 	return response($commentProfil,200)->header('Content-Type', 'application/json');
});

Route::get('/user_messages/{id}', function ($id) {
	$messageProfil = DB::table('messages')
    	->select('users.*', 'messages.*')
		->join('users', 'users.id', '=', 'messages.user_id')
		->where('users.id', '=', $id)
		->where('messages.user_id', '=', $id)
		->orderBy('messages.id','desc')
		->get()->toJson();
 	return response($messageProfil,200)->header('Content-Type', 'application/json');
});