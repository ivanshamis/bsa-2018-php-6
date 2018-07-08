<?php

namespace App\Services;

class Currency
{
    protected $id;
    protected $name;
    protected $shortName;
    protected $actualCourse;
    protected $actualCoursDate;
    protected $active;

    public function __construct($id,$name,$shortName,$actualCourse,$actualCoursDate,$active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
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
        return $this->shortName;
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