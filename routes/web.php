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

Route::get('/', function () {
	return view('auth.login');
});
//hanya perobaan
route::get('/cobatemuan/{id}','cobacontroller@cobatemuan');
route::get('/panduan','cobacontroller@panduan');
Route::get('/panduan/data', 'cobacontroller@getpanduan');





Auth::routes();
//summernote
Route::get('/summernote','SummernoteController@index');
Route::view('/summernote2','summernote2');
Route::post('/summernote','SummernoteController@store')->name('summernotePersist');
Route::get('/summernote_display','SummernoteController@show')->name('summernoteDisplay');
Route::put('/summernote/update/{summernote}','SummernoteController@update')->name('summernoteUpdate');
Route::get('/summernote/template','SummernoteController@pilihtemplate')->name('summernotetemplate');



Route::get('/data','admincontroller@datamaster')->name('datamaster');
Route::get('/dashboard','AuthController@dashboard')->name('dashboard');
Route::get('/uang','admincontroller@uang')->name('uang');


//contoh
Route::get("addmore","temuanController@addMore");
Route::post("addmore","temuanController@addMorePost");

Route::get("tambah","temuanController@tambah");
// Route::post("tambahkda1","temuanController@tambahkda1");
// Route::post("tambahkda2","temuanController@tambahkda2");
// Route::post("tambahkda3","temuanController@tambahkda3");
Route::post("tambahkda4","temuanController@tambahkda4");

//Bisa
Route::post('/get/child', 'admincontroller@getChild');
Route::get('/tables', 'admincontroller@tables');
//Route::get('pdf/{id}',  'temuanController@buatpdf');

Route::get('/pilihkda', 'kdacontroller@pilih');
Route::get('/pilihkda2', 'kdacontroller@pilih2');

Route::get('pilihkda/{id}', 'kdacontroller@formkda');

Route::get('pdf3',  'pdfcontroller@buatpdf3');
// Route::get('pdf/{id}',  'pdfcontroller@downloadpdf');

Route::get('download',  'pdfcontroller@downloadkdatriwulan');
//Route::get('download/tahun/{tahun}/triwulan/{i}', 'pdfcontroller@downloadkdatriwulan2')->name('downloadtriwulan');
Route::get('laporan',  'pdfcontroller@laporan2');

// Route::get('/kdatriwulan', 'kdacontroller@triwulan');
// Route::get('download/triwulan/{tahun}/{sesi?}', [
//     'as' => 'downloadtriwulan',
//     'uses' => 'pdfcontroller@downloadkdatriwulanfix',
// ]);
Route::post('/kda/temuan', 'cobacontroller@gettemuan');
// Route::post('/temuan/temuanlama', 'temuanController@gettemuanlama');


Route::get('/temuan', 'cobacontroller@bulan');
//Route::get('/temuan/update', 'cobacontroller@updatetemuan');
// Route::post('/kda/data', 'cobacontroller@getkda');

// Route::post('/kda/update', 'cobacontroller@updatekda');
// Route::post('/kda/keterangan', 'cobacontroller@getketerangan');
Route::post('/keterangan/update', 'cobacontroller@updateketerangan');
Route::get('/kda/coba/{id}', 'cobacontroller@coba');

Route::group(['prefix' => 'laravel-crud-search-sort-ajax-modal-form'], function () {
	Route::get('/', 'Crud5Controller@index');
	Route::match(['get', 'post'], 'create', 'Crud5Controller@create');
	Route::match(['get', 'put'], 'update/{id}', 'Crud5Controller@update');
	Route::delete('delete/{id}', 'Crud5Controller@delete');
});

//Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@showRegister')->name('register')->middleware('guest');
Route::post('/register', 'AuthController@register');
Route::post('/logout', 'AuthController@logout')->name('logout');
Route::get('/hak','AuthController@hak')->name('hak');




Route::get('/login', 'AuthController@showLogin')->name('login')->middleware('guest');
Route::get('/login2', 'AuthController@login2');
Route::get('/tujuan', 'AuthController@tujuan');
Route::get('/logout2', 'AuthController@logout2')->name('logout2');

Route::group(['middleware' => 'Admin'], function () {
	Route::get('/admin','AuthController@home')->name('home1');
	Route::get('/kda', 'KdaController@index');
	Route::post('/kda/data', 'KdaController@getkda');
	Route::post('/kda/kelengkapan', 'KdaController@getkelengkapan');
	Route::get('/kda/kelengkapan/update', 'KdaController@updatekelengkapan');
	Route::post('/kda/keterangan', 'KdaController@getketerangan');
	Route::post('/kda/update', 'KdaController@updatekda');
	Route::post('/temuan/temuanlama', 'TemuanController@gettemuanlama');
	Route::get('/temuan/update', 'TemuanController@updatetemuan');

	Route::get('/buatkda', 'KdaController@buatkda');
	Route::post("tambahkda1","KdaController@tambahkda1");
	Route::post("tambahkda2","KdaController@tambahkda2");
	Route::post("tambahkda3","KdaController@tambahkda3");
	
	Route::get('pdf/{id}',  'PdfController@downloadpdf');

	Route::get('/kdatriwulan', 'KdaController@triwulan');
	Route::get('download/triwulan/{tahun}/{sesi?}', [
    'as' => 'downloadtriwulan',
    'uses' => 'PdfController@downloadkdatriwulanfix',
	]);

	Route::get('/templatekda', 'KdaController@template');
	Route::get('/temuankda', 'TemuanController@index');

});

Route::group(['middleware' => 'Member'], function () {
	Route::get('/member','AuthController@homemember')->name('home2');
});
Route::group(['middleware' => 'Pimpinan'], function () {
	Route::get('/member2','AuthController@homemember')->name('home2');
});
