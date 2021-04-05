<?php
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/check', 'CheckController@index')->name('check.index')->middleware('auth');
Route::post('/checkout', 'CheckController@store')->name('check.store');

Route::get('/guestcheck', 'CheckController@index')->name('guestcheck.index');

Route::post('/cartt/', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/{prodct}', 'CartController@ForLater')->name('cart.ForLater');
Route::post('/update/{product}', 'CartController@update')->name('cart.update');
Route::post('/coupon', 'CouponController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponController@destroy')->name('coupon.destroy');

Route::delete('/SaveForLater/{product}', 'ForLaterController@destroy')->name('ForLater.destroy');
Route::post('/SaveForLater/{product}', 'ForLaterController@switchToCart')->name('ForLater.swtichToCart');



Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mailable', function () {

	$order = App\Orderrs::find(1);
    return new App\Mail\OrderPlaced($order);
});
Auth::routes();



Route::get('/new2', 'PagesController@new2');
Route::post('/new1', 'PagesController@new1')->name('ajaxRequest.post');
Route::get('/landing', 'PagesController@index');
Route::get('/', 'ProductsController@index')->name('shop.index');
Route::get('/{p}', 'ProductsController@show')->name('shop.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts','PostController');

Auth::routes();
 

Route::get('/posts', 'PostController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
