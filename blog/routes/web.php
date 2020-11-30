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

Route::get('example', function () {
  $games      = App\Game::all()->take(2);
  $categories = App\Category::all()->take(3);
  $users      = App\User::all()->take(10);
  return view('example')
              ->with('games', $games)
              ->with('categories', $categories)
              ->with('users', $users);
});

// Exports PDF
Route::get('generate/pdf/users', 'UserController@pdf');

Auth::routes();

//Ressources

// Group Middleware
Route::group(['middleware' => 'admin'], function() {
    // Resources
    Route::resources([
        'users'       => 'UserController',
        'categories'  => 'CategoryController',
        'games'       => 'GameController',
    ]);
});

// Export PDF
Route::get('generate/pdf/users', 'UserController@pdf');
// Export Excel
Route::get('generate/excel/users', 'UserController@excel');
// Import Excel
Route::post('import/excel/users', 'UserController@import');
// Search Scope
Route::post('users/search', 'UserController@search');


// Export PDF Games
Route::get('generate/pdf/games', 'GameController@pdf');
// Export Excel Games
Route::get('generate/excel/games', 'GameController@excel');
// Import Excel Games
Route::post('import/excel/games', 'GameController@import');
// Search Scope Games
Route::post('games/search', 'GameController@search');

Route::get('/home', 'HomeController@index')->name('home');

// Middleware
Route::get('locale/{locale}', 'LocaleController@index');


