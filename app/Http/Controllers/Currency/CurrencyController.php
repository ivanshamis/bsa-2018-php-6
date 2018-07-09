<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CurrencyRepositoryInterface;

abstract class CurrencyController extends Controller
{
    protected $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
