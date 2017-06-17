<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//web
//お客様ページ

//TOPページ
Route::get('/','PizatopController@index');
//メニュー
Route::get('/menu','PizamenuController@index');
//メニュー詳細
Route::get('/menu_detail','MenudetailController@index');
//カートに商品を追加
Route::post('/cart', 'CartController@add');
//カートの一覧表示
Route::get('/cart', 'CartController@index');
//カートの商品を削除
Route::post('/cdelete', 'CartController@delete');
//カートを空にする
Route::get('/cdelete/all', 'CartController@clear');
//DBにinsert
Route::get('/cinsert', 'CartController@insert');
//個数変更
Route::post('/cup', 'CartController@change');
//会計画面
Route::get('/accounting', 'accountingController@index');
//販売画面
Route::get('/buy','buyController@index');
//販売表にinsert
Route::post('/winsert', 'buyController@insert');
//ブラックリスト
Route::get('/tou','TouController@index');
//マイページ
Route::get('/membetr', 'MenberController@index');
//注文履歴
Route::get('/orderhistory', 'OrderhistoryController@index');
//登録情報確認
Route::get('/mkakunin', 'infoController@index');
//登録情報編集
Route::get('/change', 'infoController@edi');
Route::post('/mhensyu', 'infoController@update');
//退会
Route::get('/withdrawal','UserdelController@index');
Route::get('/taikai','UserdelController@del');

//User Login
Route::get('user/login', 'UserAuth\LoginController@showLoginForm');
Route::post('user/login', 'UserAuth\LoginController@login');
Route::post('user/logout', 'UserAuth\LoginController@logout');
Route::get('user/logout', 'UserAuth\LoginController@logout');

//User Register
Route::get('user/register', 'UserAuth\RegisterController@index');
Route::post('/utuika', 'UserAuth\RegisterController@tuika');

//Admin Login
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin/login', 'AdminAuth\LoginController@login');
Route::post('admin/logout', 'AdminAuth\LoginController@logout');

//Admin Register
Route::get('/reg', 'AdminAuth\RegisterController@index');
Route::post('/jtuika', 'AdminAuth\RegisterController@tuika');

/* 管理画面 */

//商品管理
Route::get('/k_shohin','ShohinController@index');
//商品追加
Route::get('/k_stuika','ShohinController@tuika');
Route::post('/insert','ShohinController@insert');
//商品編集
Route::get('/k_shensyu','ShohinController@hensyu');
Route::post('/update','ShohinController@update');
//商品削除
Route::get('/delete','ShohinController@delete');
//商品検索
Route::post('/k_skensaku','ShohinController@kensaku');
//従業員
Route::get('/k_jyugyoin','jyugyoinController@index');
//配達管理
Route::get('/k_haitatu','haitatuController@index');
//追加
Route::get('/k_htuika','haitatuController@tuika');
Route::post('/hinsert','haitatuController@insert');
//check
Route::post('/check','haitatuController@check');
//受注一覧
Route::get('/k_zyutyuu','zyutyuuController@index');
//check
Route::post('/check2','zyutyuuController@check');
//受注詳細
Route::get('/k_zshosai','zyutyuuController@shosai');
//編集
Route::get('/k_zhensyu','zyutyuuController@hensyu');
//個数編集
Route::post('/zkup','zyutyuuController@kup');
//削除
Route::get('/zdelete','zyutyuuController@delete');
//顧客
Route::get('/k_kokyaku','clientController@index');
//顧客詳細
Route::get('/k_kshosai','clientController@shosai');
//検索
Route::post('/k_kkensaku','clientController@kensaku');
//ブラックリスト
Route::get('/k_black','blacklistController@index');
//追加
Route::get('/k_btuika','blacklistController@tuika');
Route::post('/binsert','blacklistController@insert');
//電話注文 カートの中を一覧表示
Route::get('/k_tel','telController@index');
// カートに入れる
Route::post('/tcart','telController@add');
// 商品を削除
Route::get('/tdelete','telController@delete');
// カートを空にする
Route::get('/delete/all','telController@clear');
//購入
Route::post('/kinsert','telController@insert');
//個数変更
Route::post('/kup','telController@kup');
//お客情報登録
Route::get('/k_tshosai','telController@shosai');
//お客様情報検索
Route::post('/ken','telController@kensaku');
//売上
Route::get('/k_uriage','uriageController@index');
//結果表示
Route::post('/k_toukei','uriageController@toukei');
    