<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CurrencyRepository;

abstract class CurrencyController extends Controller
{
    protected $repository;

    public function __construct(CurrencyRepository $repository)
    {
        $this->repository = $repository;
    }
}
