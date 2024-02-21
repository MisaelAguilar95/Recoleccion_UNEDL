<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeparationController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\CollectController;
use App\Models\Product;
use App\Models\Separation;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::get('logout','logout')->middleware('auth')->name('logout');

});

Route::middleware('auth')->group(function(){
    Route::get('dashboard',function(){
        if(auth()->user()->level == 'administrador' ){
            $separations = Separation::where('status', '=','paid')->get();
            $materials = Product::all();
            //dd($separations);
            $totalbags =0;
            $totalweigth =0;
            $totalmerma = 0;
            $totalpayment=0;
            $totalm3=0;
            foreach($separations as $separation){
                $totalbags += $separation->num_bags;
                $totalweigth += $separation->weight;
                $totalmerma += $separation->merma;
                $totalpayment += $separation->payment;
                $totalm3 += $separation->m3;
            }
            //dd($totalbags,$totalweigth);
            return view('dashboard', compact('materials','totalbags','totalweigth','totalmerma','totalpayment', 'separations','totalm3'));
        } else{
            return redirect()->route('profile');
        }

        
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('materials')->group(function(){
        Route::get('','index')->name('materials');
        Route::get('pricelist','pricelist')->name('materials.pricelist');
        Route::get('create','create')->name('materials.create');
        Route::post('store','store')->name('materials.store');
        Route::get('show/{id}','show')->name('materials.show');
        Route::get('edit/{id}','edit')->name('materials.edit');
        Route::get('pricelistEdit/{id}','pricelistEdit')->name('materials.pricelistEdit');
        Route::put('edit/{id}','update')->name('materials.update');
        Route::put('pricelistEdit/{id}','pricelistUpdate')->name('materials.pricelistUpdate');
        Route::delete('destroy/{id}','destroy')->name('materials.destroy');

    });

    Route::controller(SeparationController::class)->prefix('separations')->group(function(){
        //Route::get('','index')->name('materials');
        Route::get('','index')->name('separations');
        Route::get('create','create')->name('separations.create');
        Route::post('store','store')->name('separations.store');
        Route::get('edit/{id}','edit')->name('separations.edit');
        Route::post('edit/{id}','update')->name('separations.update');
        Route::delete('destroy/{id}','destroy')->name('separations.destroy');

    });

    Route::controller(ValidationController::class)->prefix('validations')->group(function(){
        Route::get('','index')->name('validations');
        Route::get('validated/{id}','validated')->name('validations.validated');


    });

    Route::controller(CollectController::class)->prefix('collections')->group(function(){
        Route::get('','index')->name('collections');
        Route::post('store','store')->name('collections.store');
        Route::get('sendMail','sendMail')->name('collections.mail');
        Route::post('collect/{id}','collect')->name('collections.collect');
        Route::post('payment/{id}','payment')->name('collections.payment');
        Route::get('paid','paid')->name('collections.paid');
        Route::get('collect','view')->name('collections.view');
        Route::get('edit/{id}','edit')->name('collections.edit');
        Route::put('edit/{id}','update')->name('collections.update');
        Route::delete('destroy/{id}','destroy')->name('collections.destroy');

    });

    Route::get('/perfil',[AuthController::class,'profile'])->name('profile');
});
