<?php

namespace App\Repositories;

use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository implements CountryRepositoryInterface
{
    public function getAll()
    {
        return Country::all();
    }

    public function getById( int $countryId)
    {
        return Country::findOrFail($countryId);
    }

}
