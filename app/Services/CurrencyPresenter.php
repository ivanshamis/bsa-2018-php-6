<?php
namespace App\Services;
class CurrencyPresenter
{
    public static function present($currency): array
    {
        if (is_array($currency)) {
            foreach ($currency as $single_currancy) { 
                $presented[] = self::present($single_currancy); 
            }            
            return $presented;
        }
        else {
            return [
                'id' => $currency->getID(),
                'name' => $currency->getName(),
                'short_name' => $currency->getShortName(),
                'actual_course' => $currency->getActualCourse(), 
                'actual_course_date' => $currency->getActualCourseDate(),
                'active' => $currency->isActive()
            ];
        }
    }
}