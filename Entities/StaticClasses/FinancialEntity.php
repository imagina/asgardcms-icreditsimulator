<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class FinancialEntity
 * @package Modules\Icreditsimulator\Entities
 */
class FinancialEntity
{

    const COMMERCIAL = 0;
    const INVESTMENT = 1;
    const CORPORATE = 2;
    const MORTGAGE = 3;

    /**
     * @var array
     */
    private $financialEntities = [];

    public function __construct()
    {
        $this->financialEntities = [
            self::COMMERCIAL => trans('icreditsimulator::financial_entity.commercial'),
            self::INVESTMENT => trans('icreditsimulator::financial_entity.investment'),
            self::CORPORATE => trans('icreditsimulator::financial_entity.corporate'),
            self::MORTGAGE => trans('icreditsimulator::financial_entity.mortgage'),
        ];
    }

    /**
     * Get the available financialEntities
     * @return array
     */
    public function lists()
    {
        return $this->financialEntities;
    }

    /**
     * Get the financialEntities
     * @param int $typeId
     * @return string
     */
    public function get($typeId)
    {
        if (isset($this->financialEntities[$typeId])) {
            return $this->financialEntities[$typeId];
        }

        return $this->financialEntities[self::NOTHING];
    }
}
