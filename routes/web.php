<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PagesAddController;
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

//Route gruppa sozdat qilib olamiz

Route::group(['middleware' => 'web'], function(){
    Route::match(['get', 'post'],'/',[IndexController::class,'execute'])->name('home');
    Route::get('/page/{alias}',[PageController::class,'execute'])->name('page');
    Route::auth();
});

//adminka
Route::group(['prefix'=>'admin','middleware' => 'auth'], function (){
   Route::get('/', function(){
        if (view()->exists('admin.index')){
            $data = ['title' => 'Панель Администратора'];
            return view('admin.index',$data);
        }
   });

   Route::group(['prefix'=>'pages'], function (){
      Route::get('/',[PagesController::class,'execute'])->name('pages');
       Route::match(['get', 'post'],'/add',[PagesAddController::class,'execute'])->name('pageAdd');
       Route::match(['get', 'post','delete'],'/edit/{page}','PageEditController@execute')->name('pagesEdit');
   });

    Route::group(['prefix'=>'portfolios'], function (){
        Route::get('/','PortfolioController@execute')->name('portfolio');
        Route::match(['get', 'post'],'/add','PortfolioAddController@execute')->name('portfolioAdd');
        Route::match(['get', 'post','delete'],'/edit/{portfolio}','PortfolioEditController@execute')->name('portfolioEdit');
    });

    Route::group(['prefix'=>'services'], function (){
        Route::get('/','ServiceController@execute')->name('services');
        Route::match(['get', 'post'],'/add','ServiceAddController@execute')->name('servicesAdd');
        Route::match(['get', 'post','delete'],'/edit/{services}','ServiceEditController@execute')->name('servicesEdit');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
