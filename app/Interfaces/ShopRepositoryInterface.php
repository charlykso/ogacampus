<?php

namespace App\Interfaces;

interface ShopRepositoryInterface
{
    public function createOrUpdate(array $data, int $id = null);

    public function getAll();

    public function getAllByUserId(int $id);

    public function getBySchool(int $schoolId);

    public function getById(int $id);

    public function getByUuid(int $id);

    public function getBySlug(string $slug);

    public function getByStatus(string $status);
}
