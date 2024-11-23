<?php

namespace Database\Seeders;

use App\Models\Location_amphure;
use App\Models\Location_province;
use App\Models\Location_tumbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $jsonData = Storage::disk('local')->get('location_data.json');
            $locations = json_decode($jsonData, true);

            foreach ($locations as $each_province) {
                $province = Location_province::create([
                    "name_th" => $each_province['name_th'],
                    "name_en" => $each_province['name_en'],
                ]);

                foreach ($each_province['amphure'] as $each_amphure) {
                    $amphure = Location_amphure::create([
                        "name_th" => $each_amphure['name_th'],
                        "name_en" => $each_amphure['name_en'],
                        "province_id" => $province->id
                    ]);

                    foreach ($each_amphure['tambon'] as $each_tambon) {
                        Location_tumbon::create([
                            "zipcode" => $each_tambon['zip_code'],
                            "name_th" => $each_tambon['name_th'],
                            "name_en" => $each_tambon['name_en'],
                            "amphure_id" => $amphure->id
                        ]);
                    }
                }
            }
            echo "--- Seed Location (Province, Amphure, Tumbon) successfully. ---\n";
        } catch (\Throwable $th) {
            //throw $th;
            echo "!!! Seed Location (Province, Amphure, Tumbon) unsuccessfully. !!!\n";
            echo $th->getMessage();
        }
    }
}
