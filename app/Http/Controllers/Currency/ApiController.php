<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use App\Services\{Currency,CurrencyPresenter};

class ApiController extends CurrencyController
{
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
        $date = \DateTime::createFromFormat('Y-m-d H-i-s',$request->input('actual_course_date'));
        $currency = new Currency(
            $this->repository->newId(),
            $request->input('name'),
            $request->input('short_name'),
            $request->input('actual_course'),
            $date,
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
                $currency->setName($request->input('name'));
            }
            if ($request->has('short_name')) {
                $currency->setShortName($request->input('short_name'));
            }
            if ($request->has('actual_course')) {
                $currency->setActualCourse($request->input('actual_course'));
            }
            if ($request->has('actual_course_date')) {
                $date = \DateTime::createFromFormat('Y-m-d H-i-s',$request->input('actual_course_date'));
                $currency->setActualCourseDate($date);
            }
            if ($request->has('active')) {
                $currency->setActive($request->input('active'));
            }
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