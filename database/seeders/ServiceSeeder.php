<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Day;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate the services table if necessary
        // DB::table('services')->truncate(); // Comment this if you're encountering foreign key issues

        // Insert services
        DB::table('services')->insert([
            [
                'name' => 'Klassieke haarsnit',
                'price' => 20,
                'currency' => '€',
                'min_price' => 20,
                'max_price' => null,
                'image' => 'assets/images/klassiek.jpg'
            ],
            [
                'name' => 'Fade haarsnit',
                'price' => 25,
                'currency' => '€',
                'min_price' => 25,
                'max_price' => null,
                'image' => 'assets/images/fade.jpg'
            ],
            [
                'name' => 'Haar en baard',
                'price' => 30, // Use a base price
                'currency' => '€',
                'min_price' => 30,
                'max_price' => 35,
                'image' => 'assets/images/Haar.jpg'
            ],
            [
                'name' => 'Baard',
                'price' => 15,
                'currency' => '€',
                'min_price' => 15,
                'max_price' => null,
                'image' => 'assets/images/Baraad.jpg'
            ],
            [
                'name' => 'Kinderen',
                'price' => 15,
                'currency' => '€',
                'min_price' => 15,
                'max_price' => null,
                'image' => 'assets/images/IMG_6691.JPG'
            ],
            [
                'name' => 'Broske',
                'price' => 15,
                'currency' => '€',
                'min_price' => 15,
                'max_price' => null,
                'image' => 'assets/images/broske.jpg'
            ],
        ]);

        // Fetch all services
        $services = Service::all();

        // Fetch all day IDs
        $days = Day::all()->pluck('id')->toArray();

        // Attach all days to each service
        foreach ($services as $service) {
            $service->days()->sync($days);
        }
    }
}
