<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Listings\Models\Country;
use App\Modules\Listings\Models\State;
use App\Modules\Listings\Models\City;
use App\Modules\Listings\Models\Area;

class LocationsSeeder extends Seeder
{
    public function run()
    {
        // Country
        $india = Country::create([
            'name' => 'India',
            'iso_code' => 'IN',
            'status' => true,
        ]);

        // State
        $gujarat = State::create([
            'country_id' => $india->id,
            'name' => 'Gujarat',
            'status' => true,
        ]);

        // Cities
        $cities = [
            'Ahmedabad' => ['380009' => 'Navrangpura', '380015' => 'Vastrapur', '380054' => 'Bodakdev'],
            'Surat' => ['395007' => 'Vesu', '395009' => 'Adajan'],
            'Vadodara' => ['390007' => 'Alkapuri', '390019' => 'Gotri'],
            'Rajkot' => ['360001' => 'Yagnik Road', '360005' => 'Kalawad Road'],
            'Gandhinagar' => ['382007' => 'Sector 7', '382421' => 'Sargasan'],
        ];

        foreach ($cities as $cityName => $areas) {
            $city = City::create([
                'state_id' => $gujarat->id,
                'name' => $cityName,
                'status' => true,
            ]);

            foreach ($areas as $pincode => $areaName) {
                Area::create([
                    'city_id' => $city->id,
                    'name' => $areaName,
                    'pincode' => $pincode,
                ]);
            }
        }
    }
}
