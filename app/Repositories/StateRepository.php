<?php

namespace App\Repositories;

use App\Interfaces\StateRepositoryInterface;
use App\Models\State;

class StateRepository implements StateRepositoryInterface
{
    public function getAll()
    {
        return State::all();
    }

    public function getCountryStates($countryId)
    {
        return State::where('country_id', $countryId)->get();
    }


}
