<?php

use App\Services\{CurrencyRepositoryInterface,CurrencyPresenter};
//use App\Http\Middleware\RedirectToCurrenciesMiddleware;

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

/*Route::get('/admin/currencies', function () {
    $repository =  App::make(CurrencyRepositoryInterface::class);
    $currencies = $repository->findAll();
    $presented = CurrencyPresenter::present($currencies);    
    return Response::view('currencies', ['currencies' => $presented]);
});

Route::get('/admin', function () {
})->middleware('redirect');*/

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
    })->middleware('redirect');
    Route::get('/currencies', function () {
        $repository =  App::make(CurrencyRepositoryInterface::class);
        $currencies = $repository->findAll();
        $presented = CurrencyPresenter::present($currencies);    
        return Response::view('currencies', ['currencies' => $presented]);
    }); 
}); 