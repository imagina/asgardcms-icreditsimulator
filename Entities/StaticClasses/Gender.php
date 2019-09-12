<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class Gender
 * @package Modules\Icreditsimulator\Entities
 */
class Gender
{

    const MALE = 0;//Male
    const FEMALE = 1;//Female

    /**
     * @var array
     */
    private $genders = [];

    public function __construct()
    {
        $this->genders = [
            self::MALE => trans('icreditsimulator::gender.female'),
            self::FEMALE => trans('icreditsimulator::gender.male')
        ];
    }

    /**
     * Get the available genders
     * @return array
     */
    public function lists()
    {
        return $this->genders;
    }

    /**
     * Get the gender
     * @param int $statusId
     * @return string
     */
    public function get($genderId)
    {
        if (isset($this->genders[$genderId])) {
            return $this->genders[$genderId];
        }

        return $this->genders[self::MALE];
    }
}
