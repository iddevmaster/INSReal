<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'insreal@iddrives',
                'password' => Hash::make('insreal@iddrives'), // Hash the password
            ]);
            echo "--- Seed user successfully. ---\n";
        } catch (\Throwable $th) {
            //throw $th;
            echo "!!! Seed user unsuccessfully. !!!\n";
            echo $th->getMessage();
        }
    }
}
