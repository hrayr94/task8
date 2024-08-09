<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'title' => 'Eagle Apartments',
            'status' => 'For Sale',
            'is_featured' => true,
            'price' => 275000,
            'price_per_sq_ft' => 520,
            'address' => '9364 School St. Lynchburg, NY',
            'area' => 530,
            'bedrooms' => 2,
            'bathrooms' => 1,
            'agent_name' => 'David Strozier',
            'images' => json_encode(['listing-01.jpg', 'listing-01b.jpg', 'listing-01c.jpg'])
        ]);
    }
}
