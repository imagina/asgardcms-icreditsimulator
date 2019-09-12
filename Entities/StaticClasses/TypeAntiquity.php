<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class TypeAntiquity
 * @package Modules\Icreditsimulator\Entities
 */
class TypeAntiquity
{

    const YEARS = 0;//AÑOS
    const MONTHS = 1;//MESES

    /**
     * @var array
     */
    private $typesAntiquities = [];

    public function __construct()
    {
        $this->typesAntiquities = [
            self::YEARS => trans('icreditsimulator::type_antiquity.years'),
            self::MONTHS => trans('icreditsimulator::type_antiquity.months')
        ];
    }

    /**
     * Get the available typesAntiquities
     * @return array
     */
    public function lists()
    {
        return $this->typesAntiquities;
    }

    /**
     * Get the gender
     * @param int $statusId
     * @return string
     */
    public function get($typeId)
    {
        if (isset($this->typesAntiquities[$typeId])) {
            return $this->typesAntiquities[$typeId];
        }

        return $this->typesAntiquities[self::YEARS];
    }
}
