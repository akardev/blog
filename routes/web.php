<?php

use App\Http\Controllers\Back\Dasgboard;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Front\Homepage;

use Illuminate\Support\Facades\Route;







/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
Route::get('site-bakimda',function(){
    return view('front.offline');
});



Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('giris', 'App\Http\Controllers\Back\Auth1@login')->name('login');
    Route::post('giris', 'App\Http\Controllers\Back\Auth1@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('panel', 'App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    // ARTICLES ROUTE'S
    Route::get('makaleler/silinenler','App\Http\Controllers\Back\ArticleController@trashed')->name('article.trashed');
    Route::resource('makaleler', 'App\Http\Controllers\Back\ArticleController');
    Route::get('/switch', 'App\Http\Controllers\Back\ArticleController@switch')->name('switch');
    Route::get('/deletearticle/{id}', 'App\Http\Controllers\Back\ArticleController@delete')->name('article.delete');
    Route::get('/harddeletearticle/{id}', 'App\Http\Controllers\Back\ArticleController@harddelete')->name('article.hard.delete');
    Route::get('/recoverarticle/{id}', 'App\Http\Controllers\Back\ArticleController@recover')->name('article.recover');
    // CATEGORIES ROUTE'S
    Route::get('kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::post('kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
    Route::post('kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    Route::get('kategori/status','App\Http\Controllers\Back\CategoryController@switch1')->name('category.switch1');
    Route::get('kategori/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getData');
    // PAGE ROUTE'S
    Route::get('sayfalar','App\Http\Controllers\Back\PageController@index')->name('pages.index');
    Route::get('/sayfalar/olustur', 'App\Http\Controllers\Back\PageController@create')->name('pages.create');
    Route::get('/sayfalar/guncelle/{id}', 'App\Http\Controllers\Back\PageController@update')->name('pages.edit');
    Route::post('/sayfalar/guncelle/{id}', 'App\Http\Controllers\Back\PageController@updatePost')->name('pages.edit.post');
    Route::post('/sayfalar/olustur', 'App\Http\Controllers\Back\PageController@post')->name('pages.create.post');
    Route::get('/sayfa/switch', 'App\Http\Controllers\Back\PageController@switch')->name('page.switch');
    Route::get('sayfalar/sil/{id}','App\Http\Controllers\Back\PageController@delete')->name('pages.delete');

    // CONFIG ROUTE'S
    Route::get('ayarlar','App\Http\Controllers\Back\ConfigController@index')->name('config.index');
    Route::post('ayarlar/update','App\Http\Controllers\Back\ConfigController@update')->name('config.update');




    Route::get('cikis', 'App\Http\Controllers\Back\Auth1@logout')->name('logout');
    
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

//sabit url'lerimizi basta tanımlayalım
Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('yazilar', 'App\Http\Controllers\Front\Homepage@index');
Route::get('/iletisim', 'App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim', 'App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}', 'App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}', 'App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}', 'App\Http\Controllers\Front\Homepage@page')->name('page');
