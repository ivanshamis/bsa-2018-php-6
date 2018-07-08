<?php

namespace App\Services;

class Currency
{
    protected $id;
    protected $name;
    protected $price;
    protected $imageUrl;
    protected $dailyChangePercent;
    protected $active;

    public function __construct($id,$name,$shortname,$actualCourse,$actualCoursDate,$active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortname = $shortname;
        $this->actualCourse = $actualCourse;
        $this->actualCoursDate = $actualCoursDate;
        $this->active = $active;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getShortName()
    {
        return $this->shortname;
    }
    public function getActualCourse()
    {
        return $this->actualCourse;
    }
    public function getActualCourseDate()
    {
        return $this->actualCoursDate;
    }

    public function isActive()
    {
        return $this->active;
    }
}