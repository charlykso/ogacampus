<?php
namespace App\Interfaces;

interface VerificationRepositoryInterface {
    public function createOrUpdate(array $data, int $id = null);
    public function getAll();
    public function getBySchool(int $schoolId);
    public function getByStatus(string $status = 'pending');
    public function getByStaff(int $staffId);
}
