<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function () {
    $iplist = DB::table('net_ips')->orderBy('netaddress', 'ASC')->lists('netaddress', 'netaddress');
    
    return View::make('home')->with('iplist', $iplist);
}));


Route::get('acercade', function()
{
	return View::make('acerca');
});

// route to show the login form
Route::get('login', array('as' => 'login','uses' => 'UsersController@showLogin'));
// route to process the form
Route::post('login', array('as' => 'login','uses' => 'UsersController@doLogin'));
Route::get('logout', array('as' => 'logout','uses' => 'UsersController@doLogout'));
//Route::get('logout', array('uses' => 'HomeController@doLogout')); //->before('auth');

Route::group(array('before' => 'auth'), function()
{
    Route::get('users/pass', array('as' => 'users.pass','uses'=> 'UsersController@showPass'));
    Route::post('users/pass', array('as' => 'users.pass','uses'=> 'UsersController@doPass'));

    Route::post('iplist', array('as' => 'iplist','uses'=> 'BuscarController@iplist'));
    Route::get('iplist', array('as' => 'iplist','uses'=> 'BuscarController@iplist'));
    Route::post('buscar', array('as' => 'buscar','uses'=> 'BuscarController@buscar'));
    Route::get('buscar', array('as' => 'buscar','uses'=> 'BuscarController@buscar'));
    Route::resource('ipinfo', 'IpinfoController');
    //Route::resource('ipadmin', 'IpadminController');
    
    
    // only for sysadmins:
    Route::resource('adminusers', 'AdminUsersController');   
    //Route::resource('map', 'GmapController');
});

Route::resource('users', 'UsersController');
