<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (($usersCSV = fopen(base_path() . "/database/seeders/data/users.csv", "r")) !== false) {
            while (($usersCSVData = fgetcsv($usersCSV)) !== false) {

                if ($usersCSVData[0] == "id") {
                    continue;
                }

                DB::table("users")->insertOrIgnore([
                    "id" => $usersCSVData[0],
                    "name" => $usersCSVData[1],
                    "email" => $usersCSVData[2],
                    "password_hash" => $usersCSVData[3],
                    "password_plain" => $usersCSVData[4],
                    "superadmin" => $usersCSVData[5],
                    "shop_name" => $usersCSVData[6],
                    "remember_token" => $usersCSVData[7],
                    "card_brand" => $usersCSVData[10],
                    "card_last_four" => $usersCSVData[11],
                    "trial_ends_at" => $usersCSVData[12],
                    "shop_domain" => $usersCSVData[13],
                    "is_enabled" => $usersCSVData[14],
                    "billing_plan" => $usersCSVData[15],
                    "trial_starts_at" => $usersCSVData[16],
                    "created_at" => $usersCSVData[8],
                    "updated_at" => $usersCSVData[9],
                ]);
            }
            fclose($usersCSV);
        }


    }
}
