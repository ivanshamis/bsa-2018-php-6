<?php
namespace App\Services;
class CurrencyPresenter
{
    public static function present(Currency $currency): array
    {
        return  [
            'id' => $currency->getID(),
            'name' => $currency->getName(),
            'short_name' => $currency->getShortName(),
            'actual_course' => $currency->getActualCourse(), 
            'actual_course_date' => $currency->getActualCourseDate(),
            'active' => $currency->isActive()
        ];
    }
}