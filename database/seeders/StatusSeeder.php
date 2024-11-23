<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $status_data = [
                [
                    "name" => "active",
                    "label" => "ใช้งานอยู่",
                ],
                [
                    "name" => "sold",
                    "label" => "ขายแล้ว",
                ],
                [
                    "name" => "inactive",
                    "label" => "ไม่ได้ใช้งาน",
                ],
            ];

            foreach ($status_data as $status) {
                Status::create([
                    "name" => $status['name'],
                    "label" => $status['label']
                ]);
            }
            echo "--- Seed Status successfully. ---\n";
        } catch (\Throwable $th) {
            echo "!!! Seed Status unsuccessfully. !!!\n";
            echo $th->getMessage();
        }
    }
}
