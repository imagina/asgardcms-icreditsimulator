<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class TypeHousing
 * @package Modules\Icreditsimulator\Entities
 */
class TypeHousing
{

    const APARTMENT = 0;//APARTMENT

    /**
     * @var array
     */
    private $typeHousings = [];

    public function __construct()
    {
        $this->typeHousings = [
            self::APARTMENT => trans('icreditsimulator::type_housing.apartment'),
        ];
    }

    /**
     * Get the available typeHousings
     * @return array
     */
    public function lists()
    {
        return $this->typeHousings;
    }

    /**
     * Get the type housing
     * @param int $statusId
     * @return string
     */
    public function get($typeId)
    {
        if (isset($this->typeHousings[$typeId])) {
            return $this->typeHousings[$typeId];
        }

        return $this->typeHousings[self::APARTMENT];
    }
}
