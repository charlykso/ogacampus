<?php

namespace App\Interfaces;

interface RoleRepositoryInterface
{
    public function getAll();

    public function getById($roleId);

    public function delete($roleId);

    public function getByTitle($name);

    public function createOrUpdate(array $roleDetails, int $roleId = null);
}
