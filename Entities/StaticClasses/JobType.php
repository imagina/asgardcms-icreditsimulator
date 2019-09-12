<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class Gender
 * @package Modules\Icreditsimulator\Entities
 */
class JobType
{

    const FORMAL = 0;
    const INFORMAL = 1;

    /**
     * @var array
     */
    private $jobtypes = [];

    public function __construct()
    {
        $this->jobtypes = [
            self::FORMAL => trans('icreditsimulator::job_type.formal'),
            self::INFORMAL => trans('icreditsimulator::job_type.informal'),
        ];
    }

    /**
     * Get the available jobtypes
     * @return array
     */
    public function lists()
    {
        return $this->jobtypes;
    }

    /**
     * Get the jobtype
     * @param int $statusId
     * @return string
     */
    public function get($typeId)
    {
        if (isset($this->jobtypes[$typeId])) {
            return $this->jobtypes[$typeId];
        }

        return $this->jobtypes[self::FULLTIME];
    }
}
