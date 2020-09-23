<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
    return view('welcome');
  });


Route::get('helloworld', function () {
        //dd('Hello World');
	return "<h1>Hello World</h1>";
});

Route::get('users', function () {
     (App\User::all());
});

/*Route::get('consulta', function () {
    $users = App\User::all()->take(10);
    foreach ($users as $user)
    {
        $edad = Carbon::parse($user->birthdate)->age;
        $tiempocreacion = new Carbon($user->created_at);
        $tiempocreacion->setLocale('es');
        $tiemporegistro = $tiempocreacion->diffForHumans();
        echo ($user->fullname.' con '.$edad.' años de edad,'.' este usuario fue creado '.$tiemporegistro);   
         }
});*/

Route::get('challenge', function () {
foreach (App\User::all()->take(10) as $user) {
$years = Carbon::createFromDate($user->birthdate)->diff()->format('%y years old');
$since = Carbon::parse($user->created_at);
$rs[] = $user->fullname." - ".$years." - created ".$since->diffForHumans();
}
  return view('challenge', ['rs' => $rs]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
