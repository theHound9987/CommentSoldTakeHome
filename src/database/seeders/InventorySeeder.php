<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        if (($inventoryCSV = fopen(base_path() . "/database/seeders/data/inventory.csv", "r")) !== false) {
            while (($inventoryCSVData = fgetcsv($inventoryCSV)) !== false) {

                if ($inventoryCSVData[0] == "id") {
                    continue;
                }

                DB::table("inventory")->insertOrIgnore([
                    "id" => $inventoryCSVData[0],
                    "product_id" => $inventoryCSVData[1],
                    "quantity" => $inventoryCSVData[2],
                    "color" => $inventoryCSVData[3],
                    "size" => $inventoryCSVData[4],
                    "weight" => $inventoryCSVData[5],
                    "price_cents" => $inventoryCSVData[6],
                    "sale_price_cents" => $inventoryCSVData[7],
                    "cost_cents" => $inventoryCSVData[8],
                    "sku" => $inventoryCSVData[9],
                    "length" => $inventoryCSVData[10],
                    "width" => $inventoryCSVData[11],
                    "height" => $inventoryCSVData[12],
                    "note" => $inventoryCSVData[13],
                ]);

            }
            fclose($inventoryCSV);

        }
    }
}
