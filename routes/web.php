<?php

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

// 任何操作都先經過驗證
// Route::group(['middleware' => 'parameter.check'], function(){
    // 登入入口
    Route::get('Login/{host_ext_id}', 'LobbyController@Lobby_index');
    Route::post('Login/{host_ext_id}', 'LobbyController@Lobby_index');
// });
// 潑水節活動接口
Route::get('/get_songkran_info/{host_ext_id}', 'ResourceController@get_songkran_info');

// Lobby主頁Ajax接口
Route::get('/json', 'LobbyController@Lobby_index_json');
Route::post('/json', 'LobbyController@Lobby_index_json');

// 登出
Route::get('/logout', 'LobbyController@Logout');
Route::post('/logout', 'LobbyController@Logout');
// 錯誤頁面
Route::get('/maintenance', 'LobbyController@maintenance');
Route::post('/maintenance', 'LobbyController@maintenance');

// 版本號查看
Route::get('/Version', 'Controller@version');

// Lobby主頁
Route::get('/{host_ext_id}', 'LobbyController@Lobby_index');
Route::post('/{host_ext_id}', 'LobbyController@Lobby_index');