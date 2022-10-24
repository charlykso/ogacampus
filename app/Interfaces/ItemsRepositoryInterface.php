<?php

namespace App\Interfaces;

interface ItemsRepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function getByUuid(string $uuid);

    public function getBySlug(string $slug);

    public function getByStatus(string $status);

    public function delete(int $itemId);

    public function createOrUpdate(array $itemDetails, int $itemId = null);

    public function getCategories();

    public function getFeaturedItems($count = 8);

    public function getUserItems(int $userId);

    public function getByCategory(int $category_id);
}
