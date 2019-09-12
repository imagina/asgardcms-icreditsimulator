<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class CivilStatus
 * @package Modules\Icreditsimulator\Entities
 */
class CivilStatus
{

    const SINGLE = 0;//SINGLE
    const MARRIED = 1;//MARRIED
    const WIDOW = 2;//WIDOW

    /**
     * @var array
     */
    private $civilStatuses = [];

    public function __construct()
    {
        $this->civilStatuses = [
            self::SINGLE => trans('icreditsimulator::civil_status.single'),
            self::MARRIED => trans('icreditsimulator::civil_status.married')
            self::WIDOW => trans('icreditsimulator::civil_status.widow')
        ];
    }

    /**
     * Get the available civilStatuses
     * @return array
     */
    public function lists()
    {
        return $this->civilStatuses;
    }

    /**
     * Get the civil status
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->civilStatuses[$statusId])) {
            return $this->civilStatuses[$statusId];
        }

        return $this->civilStatuses[self::SINGLE];
    }
}
