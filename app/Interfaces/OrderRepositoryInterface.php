<?php
namespace App\Interfaces;

interface OrderRepositoryInterface {
    public function getAll(string $status = null);
    public function create(array $data);
    public function update(int $id, array $data);
    public function getByReference(string $reference);
    public function getById(int $id);
    public function getByEvent(int $eventID, string $status = 'completed');
    public function getByUser(int $userID, string $status = 'completed');
    public function getBySchool(int $schoolID, string $status = 'completed');
}
