<?php

namespace Database\Factories\Helpers;

class FactoryHelper
{
    /**
     * Get random model id
     *
     * @param string $model
     * @return int
     */
    public static function getRandomModelId(string $model)
    {
        $count = $model::query()->count();

        if ($count === 0) {
            return $model::factory()->create();
        } else {
            return rand(1, $count);
        }
    }
}
