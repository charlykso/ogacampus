<?php

namespace App\Interfaces;

interface ServicesRepositoryInterface
{
    public function getAll();

    public function getById(int $serviceId);

    public function getByUuid(string $uuid);

    public function delete(int $serviceId);

    public function createOrUpdate(array $serviceDetails, int $id = null);

    public function getUserService(int $userId);

    public function getSchoolService(int $schoolId);

    public function getByStatus(string $status);

    public function getRandom($number = 2);

    public function getAllActive($category = null, $price = null);
}
