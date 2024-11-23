<?php

namespace Database\Seeders;

use App\Models\Property_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $type_data = [
                [
                    "name" => "Houses",
                    "label" => "บ้าน",
                ],
                [
                    "name" => "Land",
                    "label" => "ที่ดิน",
                ],
                [
                    "name" => "House and land",
                    "label" => "บ้านพร้อมที่ดิน",
                ],
            ];

            foreach ($type_data as $type) {
                Property_type::create([
                    "name" => $type['name'],
                    "label" => $type['label']
                ]);
            }
            echo "--- Seed Type successfully. ---\n";
        } catch (\Throwable $th) {
            //throw $th;
            echo "!!! Seed Type unsuccessfully. !!!\n";
            echo $th->getMessage();
        }
    }
}
