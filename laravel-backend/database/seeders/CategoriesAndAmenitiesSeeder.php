<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Categories\Models\Category;
use App\Modules\Categories\Models\Subcategory;
use App\Modules\Amenities\Models\Amenity;
use Illuminate\SupportStr;

class CategoriesAndAmenitiesSeeder extends Seeder
{
    public function run()
    {
        // Categories
        $categories = [
            'Rooms' => ['Single Room', 'Double Sharing', 'Studio Apartment'],
            'Hostel' => ['Boys Hostel', 'Girls Hostel', 'Student Hostel'],
            'PG' => ['Boys PG', 'Girls PG', 'Co-Living PG'],
            'Roommate' => ['Flatmate Finder'],
            'Tiffin' => ['Daily Meals', 'Monthly Tiffin', 'Veg Only Tiffin'],
            'Laundry' => ['Dry Cleaning', 'Regular Wash & Iron'],
            'Local Services' => ['Packers & Movers', 'Cleaning', 'Plumbing', 'AC Repair'],
        ];

        foreach ($categories as $catName => $subcats) {
            $category = Category::create([
                'name' => $catName,
                'slug' => Str::slug($catName),
                'icon' => 'icon-' . Str::slug($catName),
                'status' => true,
            ]);

            foreach ($subcats as $subName) {
                Subcategory::create([
                    'category_id' => $category->id,
                    'name' => $subName,
                    'slug' => Str::slug($subName),
                ]);
            }
        }

        // Amenities
        $amenities = [
            'WiFi' => 'wifi-icon',
            'AC' => 'ac-icon',
            'Parking' => 'parking-icon',
            'Food Included' => 'food-icon',
            'Laundry Service' => 'laundry-icon',
            'CCTV Security' => 'cctv-icon',
            '24/7 Water' => 'water-icon',
            'Power Backup' => 'power-icon',
        ];

        foreach ($amenities as $name => $icon) {
            Amenity::create([
                'name' => $name,
                'icon' => $icon,
            ]);
        }
    }
}
