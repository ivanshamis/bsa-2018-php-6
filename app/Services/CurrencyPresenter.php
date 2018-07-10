<?php
namespace App\Services;
class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        return [
            'id' => $currency->getID(),
            'name' => $currency->getName(),
            'short_name' => $currency->getShortName(),
            'actual_course' => $currency->getActualCourse(), 
            'actual_course_date' => date('Y-m-d H-i-s'),
            'active' => $currency->isActive()
        ];
    }

    public static function presentMany(array $currencies): array
    {
        foreach ($currencies as $currancy) { 
            $presented[] = self::present($currancy); 
        }            
        return $presented;
    }
}