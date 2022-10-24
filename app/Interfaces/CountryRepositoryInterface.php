<?php

namespace App\Interfaces;

interface CountryRepositoryInterface
{
    public function getAll();
    public function getById(int $countryId);
}
