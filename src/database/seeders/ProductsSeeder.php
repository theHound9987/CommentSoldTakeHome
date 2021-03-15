<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (($productsCSV = fopen(base_path() . "/database/seeders/data/products.csv", "r")) !== false) {

            while (($productsCSVData = fgetcsv($productsCSV)) !== false) {
                if ($productsCSVData[0] == "id") {
                    continue;
                }

                DB::table("products")->insertOrIgnore([
                    "id" => $productsCSVData[0],
                    "name" => $productsCSVData[1],
                    "description" => $productsCSVData[2],
                    "style" => $productsCSVData[3],
                    "brand" => $productsCSVData[4],
                    "url" => $productsCSVData[7],
                    "type" => $productsCSVData[8],
                    "shipping_price" => $productsCSVData[9],
                    "note" => $productsCSVData[10],
                    "admin_id" => $productsCSVData[11],
                    "created_at" => $productsCSVData[5],
                    "updated_at" => $productsCSVData[6],
                ]);
            }
            fclose($productsCSV);
        }
    }
}
