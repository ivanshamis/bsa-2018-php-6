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

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function setShortName(string $shortName): void
    {
        $this->shortName = $shortName;
    }

    public function getActualCourse(): float
    {
        return $this->actualCourse;
    }

    public function setActualCourse(float $actualCourse): void
    {
        $this->actualCourse = $actualCourse;
    }

    public function getActualCourseDate()
    {
        return $this->actualCoursDate;
    }

    public function setActualCourseDate($actualCoursDate): void
    {
        $this->actualCoursDate = $actualCoursDate;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }
}