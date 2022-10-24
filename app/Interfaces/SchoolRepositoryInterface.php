<?php

namespace App\Interfaces;

interface SchoolRepositoryInterface
{
    public function getAll();

    public function fetchAll();

    public function getById($schoolId);

    public function delete($schoolId);

    public function createOrUpdate(array $data, int $schoolId = null);

    public function fetchAllByOrder($table, $dir = 'DESC');
}
