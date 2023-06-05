<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\MenuApi;
use \App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\MainAdminController;
use \App\Http\Controllers\Admin\Users\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users/login',[LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store',[LoginController::class, 'store']);


Route::middleware(['auth'])->group(function(){
    
    Route::prefix('admin')->group(function(){

        Route::get('/',[MainAdminController::class,'index'])->name('admin');
        // Route::get('/main',[MainController::class,'index']);

        #Menu
        Route::prefix('/menus')->group(function(){
            #API
            Route::get('/add',[MenuController::class,'create' ]);
            Route::post('/add',[MenuController::class,'store' ]);
            Route::get('/list',[MenuController::class,'index' ])->middleware('VerifyMiddleWare');
            Route::get('/edit/{menu}',[MenuController::class,'show' ]);
            Route::post('/edit/{menu}',[MenuController::class,'update' ]);
            Route::delete('/destroy',[MenuController::class,'destroy' ]);
        });

        #Product
        Route::prefix('products')->group(function(){
            Route::get('add', [ProductController::class,'create']);
            Route::post('add', [ProductController::class,'store']);
            Route::get('list', [ProductController::class,'index']);
            Route::get('edit/{product}', [ProductController::class,'show']);
            Route::post('edit/{product}', [ProductController::class,'update']);
            Route::delete('/destroy',[ProductController::class,'destroy' ]);
        });

        #Slider
        Route::prefix('sliders')->group(function(){
            Route::get('add', [SliderController::class,'create']);
            Route::post('add', [SliderController::class,'store']);
            Route::get('list', [SliderController::class,'index']);
            Route::get('edit/{slider}', [SliderController::class,'show']);
            Route::post('edit/{slider}', [SliderController::class,'update']);
            Route::delete('/destroy',[SliderController::class,'destroy' ]);
        });

        #Upload
        Route::post('upload/services',[UploadController::class, 'store']);
    });
    
});

Route::get('/main', [MainController::class , 'index']);
