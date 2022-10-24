<?php
namespace App\Interfaces;

interface GiveawayRepositoryInterface {
    public function createOrUpdate(array $data, int $id = null);
    public function getAll();
    public function getBySchool(int $schoolId);
    public function getActiveGiveaways(int $schoolId = null);
    public function getByStaff(int $staffId);
}
