<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\{CurrencyRepository,Currency,CurrencyPresenter};

class ApiCurrencyController extends Controller
{
    protected $repository;

    public function __construct(CurrencyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $currencies = $this->repository->findAll();
        $presented = CurrencyPresenter::present($currencies);   
        return Response(json_encode($presented),200)->header('Content-Type', 'application/json');        
    }

    public function showActive()
    {
        $currencies = $this->repository->findActive();
        $presented = CurrencyPresenter::present($currencies);   
        return Response(json_encode($presented),200)->header('Content-Type', 'application/json');        
    }

    public function show($id)
    {
        $currency = $this->repository->findById($id);
        if ($currency===NULL) {
            return Response("Error HTTP Response",404); 
        }
        else {
            $presented = CurrencyPresenter::present($currency);   
            return Response(json_encode($presented),200)->header('Content-Type', 'application/json');
        }
    }

    public function store(Request $request)
    {
        $currency = new Currency(
            NULL,
            $request->input('name'),
            $request->input('short_name'),
            $request->input('actual_course'),
            $request->input('actual_course_date'),
            $request->input('active')
        );
        $this->repository->save($currency);
        $presented = CurrencyPresenter::present($currency);
        return Response(json_encode($presented),200)->header('Content-Type', 'application/json');  
    }

    public function update($id, Request $request)
    {
        $currency = $this->repository->findById($id);
        if ($currency===NULL) {
            return Response("Error HTTP Response",404); 
        }
        else {
            if ($request->has('name')) {
                $name = $request->input('name');
            }
            else {
                $name = $currency->getName();
            }

            if ($request->has('short_name')) {
                $shortName = $request->input('short_name');
            }
            else {
                $shortName = $currency->getShortName();
            }

            if ($request->has('actual_course')) {
                $actualCourse = $request->input('actual_course');
            }
            else {
                $actualCourse = $currency->getActualCourse();
            }

            if ($request->has('actual_course_date')) {
                $actualCourseDate = $request->input('actual_course_date');
            }
            else {
                $actualCourseDate = $currency->getActualCourseDate();
            }

            if ($request->has('active')) {
                $active = $request->input('active');
            }
            else {
                $active = $currency->isActive();
            }
            $currency = new Currency($id, $name, $shortName, $actualCourse, $actualCourseDate, $active);
            $this->repository->save($currency);            
            $presented = CurrencyPresenter::present($currency);   
            return Response(json_encode($presented),200)->header('Content-Type', 'application/json');
        }
    }

    public function destroy($id)
    {  
        $currency = $this->repository->findById($id);
        if ($currency===NULL) {
            return Response("Error HTTP Response",404); 
        }
        else {
            $this->repository->delete($currency);
            return Response("Currency #{$id} is deleted!",200);
        }        
    }
}
