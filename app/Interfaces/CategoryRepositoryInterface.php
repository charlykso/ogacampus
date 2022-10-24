<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAll();

    public function getBySlug($slug);
}
