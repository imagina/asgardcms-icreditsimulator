<?php

namespace Modules\Icreditsimulator\Entities\StaticClasses;

/**
 * Class LevelStudy
 * @package Modules\Icreditsimulator\Entities
 */
class LevelStudy
{

    const PRIMARY = 0;
    const HIGHSCHOOL = 1;
    const UNIVERSITY = 2;

    /**
     * @var array
     */
    private $levels = [];

    public function __construct()
    {
        $this->levels = [
            self::PRIMARY => trans('icreditsimulator::level_study.primary'),
            self::HIGHSCHOOL => trans('icreditsimulator::level_study.highschool')
            self::UNIVERSITY => trans('icreditsimulator::level_study.university')
        ];
    }

    /**
     * Get the available levels
     * @return array
     */
    public function lists()
    {
        return $this->levels;
    }

    /**
     * Get the level
     * @param int $statusId
     * @return string
     */
    public function get($levelId)
    {
        if (isset($this->levels[$levelId])) {
            return $this->levels[$levelId];
        }

        return $this->levels[self::PRIMARY];
    }
}
