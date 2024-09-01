<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DropdownData extends Model
{
    // the custom db connection for this model
    protected $connection = 'mentor_db';

    protected $table = null;

    // Fetch countries sorted by name
    public static function fetchCountries()
    {
        return DB::connection('mentor_db')
            ->table('tbl_countries')
            ->orderBy('country_name', 'ASC')
            ->get()
            ->toArray();
    }

    // Fetch states based on country_id
    public static function fetchStates($country_id)
    {
        return DB::connection('mentor_db')
            ->table('tbl_states')
            ->select('state_id', 'state_name')
            ->where('country_id', $country_id)
            ->get()
            ->toArray();
    }

    // Fetch districts based on state_id
    public static function fetchDistricts($state_id)
    {
        return DB::connection('mentor_db')
            ->table('tbl_district')
            ->select('district_id', 'district_name')
            ->where('state_id', $state_id)
            ->get()
            ->toArray();
    }

    // Fetch selected countries based on country_id
    public static function fetchUserSelectedCountries($country_id)
    {
        return DB::connection('mentor_db')
            ->table('tbl_countries')
            ->select('country_id', 'country_name')
            ->where('country_id', $country_id)
            ->get()
            ->toArray();
    }

    // Fetch selected states based on state_id
    public static function fetchUserSelectedStates($state_id)
    {
        return DB::connection('mentor_db')
            ->table('tbl_states')
            ->select('state_id', 'state_name')
            ->where('state_id', $state_id)
            ->get()
            ->toArray();
    }

    // Fetch selected districts based on district_id
    public static function fetchUserSelectedDistricts($district_id)
    {
        return DB::connection('mentor_db')
            ->table('tbl_district')
            ->select('district_id', 'district_name')
            ->where('district_id', $district_id)
            ->get()
            ->toArray();
    }
}
