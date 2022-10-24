<?php

namespace App\Interfaces;

interface EventsRepositoryInterface
{
    public function getAll();

    public function getById(int $eventId);

    public function getByUuid(string $eventUuid);

    public function delete(int $eventId);

    public function createOrUpdate(array $data, int $eventId = null);

    public function updateEventUuid(string $eventUuid, array $newDetails);

    public function getByStatus(string $status);

    public function getAllActive($category = null, $price = null);

    public function getExpiredEvent();

    public function getUserEvent(int $userId);

    public function getSchoolEvent(int $schoolId);

    public function getRandom($number = 2);

    public function getPaidEvents();
}
