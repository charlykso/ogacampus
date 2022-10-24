<?php

namespace App\Interfaces;

interface ProfileRepositoryInterface
{
    public function getByColumn($column, $value);

    public function createOrUpdate(array $data, $profile_id = null);
}
