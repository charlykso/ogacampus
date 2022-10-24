<?php

namespace App\Interfaces;

interface StateRepositoryInterface
{
    public function getAll();
    public function getCountryStates($countryId);
}
