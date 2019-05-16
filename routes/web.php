<?php
use Illuminate\Support\Facades\Input;
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
Route::get('/storage', function () {
        Artisan::call('storage:link');
    });

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path($filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('alert/{AlertType}','SweetAlertController@alert')->name('alert');
Route::get('/', 'ViewController@index')->name('index');
Route::get('/donasi-sekarang', 'DonasiUser@pembayaran');

Route::get('about', 'ViewController@about')->name('about');
Route::resource('view-beasiswa', 'PublicBeasiswa');
Route::resource('view-usaha-kecil-menengah', 'PublicUkm');
Route::resource('view-kegiatan-infak', 'Publickegiataninfak');
Route::post('donasi-sekarang/verifikasi', 'DonasiUser@verifikasi')->name('user.verifikasi');
Route::post('donasi-sekarang/pembayaran-donasi/bayar', 'DonasiUser@prosespembayaran')->name('proses.donasi');
Route::get('donasi-sekarang/pembayaran-donasi', 'DonasiUser@pembayaran')->name('bayar.donasi');
Route::resource('donasi-sekarang', 'DonasiUser');

// Route::resource('donasi-sekarang', 'DonasiUser');

Route::get('send', function () {
    return view('sendemail');
});

Auth::routes();
Route::prefix('donatur')->group(function() {
		Route::post('berhenti-jadi-donatur-tetap', 'HomeController@stop')->name('stop-donatur');
		Route::get('/', 'HomeController@awal')->name('donatur.index');
		Route::get('/about', 'HomeController@about')->name('donatur-about');
		Route::get('home', 'HomeController@index')->name('donatur.dashboard');
		Route::resource('/beasiswa', 'Beasiswa');
		Route::resource('/usaha-kecil-menengah', 'ViewUkm');
		Route::resource('/kegiatan-infak', 'KegiatanInfak');
		Route::get('/donasi-sekarang', 'HomeController@donasidonatur')->name('donasi.donatur');
		Route::get('/edit-profile', 'HomeController@editprofile')->name('edit.profile');
		Route::put('/proses-edit-profile', 'HomeController@proseseditprofile')->name('proses.edit.profile');
		Route::get('/daftar-donatur', 'HomeController@daftardonatur')->name('daftar.donatur');
		Route::get('/daftar-mitra', 'HomeController@daftarmitra')->name('daftar.mitra');
		Route::get('/pembayaran-donatur/{id}/upload-donasi', 'HomeController@pembayarandonatur')->name('pembayaran.donatur');
		Route::post('/pembayaran-donatur/{id}/konfirmasi', 'HomeController@konfirmasi')->name('konfirmasi.bayar');
		Route::get('/view-pembayaran', 'HomeController@index');
		Route::post('/view-pembayaran', 'HomeController@verifikasi')->name('verifikasi.bayar');
		// Route::resource('/view-pembayaran', 'Verifikasi');
	});

Route::prefix('admin')->group(function() {
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showloginform')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('penyaluran/trash', 'Penyaluran@trash')->name('penyaluran.trash');
	Route::post('/penylauran/{id}/restore', 'Penyaluran@restore')->name('penyaluran.restore');
	Route::delete('/penyaluran/{id}/delete-permanent',
		'Penyaluran@deletepermanent')->name('penyaluran.deletepermanent');
	Route::resource("penyaluran", "Penyaluran");
	Route::resource("manage-donasi-user", "ManageDonasi");
	Route::resource("manageuser", "ManageUsers");
	Route::resource("manageadmin", "ManageAdmin");
	Route::resource("manage-infak", "ManageInfak");
	Route::resource("manage-mitra", "ManageMitra");
	Route::put('/ukm/{id}/cair', 'Ukm@cair')->name('ukm.cair');
	Route::resource("ukm", "Ukm");
	Route::put('/manage-beasiswa/{id}/cair', 'ManageBeasiswa@cair')->name('manage-beasiswa.cair');
	Route::resource("manage-beasiswa", "ManageBeasiswa");
	Route::resource("manage-donasi-donatur", "ManageDonasiDonatur");
	Route::resource("laporan", "Laporan");
	Route::resource("manage-program-kerja", "ManageProker");
});


Route::resource("register", "Register");

