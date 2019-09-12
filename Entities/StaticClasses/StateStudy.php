<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class StateStudy
 * @package Modules\Icreditsimulator\Entities
 */
class StateStudy
{

    const COMPLETED = 0;//COMPLETED

    /**
     * @var array
     */
    private $states = [];

    public function __construct()
    {
        $this->states = [
            self::COMPLETED => trans('icreditsimulator::state_study.completed'),
        ];
    }

    /**
     * Get the available states
     * @return array
     */
    public function lists()
    {
        return $this->states;
    }

    /**
     * Get the state
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->states[$statusId])) {
            return $this->states[$statusId];
        }

        return $this->states[self::COMPLETED];
    }
}
