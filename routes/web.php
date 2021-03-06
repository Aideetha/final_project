<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('storage/app/{filename}', function ($filename) {
    $url = storage_path('app/' . $filename);
    if (!File::exists($url)) {
        abort(404);
    }

    $file = File::get($url);
    $type = File::mimeType($url);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('admin', 'AdminController@showAdminHomePage')->name('adminHomePage');
Route::get('admin/add-category', 'AdminController@showAdminAddCategoryPage');
Route::get('admin/add-product', 'AdminController@showAdminAddProductPage');
Route::get('admin/products', 'AdminController@showProductListPage');
Route::get('admin/categories', 'AdminController@showCategoryListPage');
Route::post('postCategory', 'AdminController@registerNewCategory');
Route::post('postProduct', 'AdminController@registerNewProduct');
Route::get('product/delete/{id}', 'AdminController@deleteProduct');
Route::get('category/{categoryName}', 'AdminController@showProductByCategoryId');