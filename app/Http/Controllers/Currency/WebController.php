<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use App\Services\CurrencyPresenter;

class WebController extends CurrencyController
{
    public function __invoke()
    {
        $currencies = $this->repository->findAll();
        $presented = CurrencyPresenter::present($currencies);   
        return view('currencies', ['currencies' => $presented]);        
    }
}
