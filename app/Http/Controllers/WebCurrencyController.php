<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\{CurrencyRepository,Currency,CurrencyPresenter};

class WebCurrencyController extends Controller
{
    protected $repository;

    public function __construct(CurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $currencies = $this->repository->findAll();
        $presented = CurrencyPresenter::present($currencies);   
        return view('currencies', ['currencies' => $presented]);        
    }
}
