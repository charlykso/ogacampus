<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAll();
    public function getByRole(int $role);
    public function getById($userId);
    public function getByUuid(string $uuid);
    public function delete($userId);
    public function createOrUpdate(array $data, int $userId = null);
    public function getByVerificationStatus(bool $isVerified = false);
    public function getBySchool(int $schoolId);
}
