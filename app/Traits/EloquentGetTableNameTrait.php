<?php

namespace App\Traits;

trait EloquentGetTableNameTrait
{
    /**
     * Get table name
     *
     * @return void
     */
    public static function getTableName()
    {
        return ((new self)->getTable());
    }
}