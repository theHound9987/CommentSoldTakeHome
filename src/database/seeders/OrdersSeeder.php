<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (($ordersCSV = fopen(base_path() . "/database/seeders/data/orders.csv", 'r')) !== false) {

            while (($ordersCSVData = fgetcsv($ordersCSV)) !== false) {

                if ($ordersCSVData[0] == "id") {
                    continue;
                }

                DB::table("orders")->insertOrIgnore([
                    "id" => $ordersCSVData[0],
                    "product_id" => $ordersCSVData[1],
                    "inventory_id" => $ordersCSVData[2],
                    "street_address_1" => $ordersCSVData[3],
                    "street_address_2" => $ordersCSVData[4],
                    "city" => $ordersCSVData[5],
                    "state" => $ordersCSVData[6],
                    "country_code" => $ordersCSVData[7],
                    "zip" => $ordersCSVData[8],
                    "phone_number" => $ordersCSVData[9],
                    "email" => $ordersCSVData[10],
                    "name" => $ordersCSVData[11],
                    "order_status" => $ordersCSVData[12],
                    "payment_ref" => $ordersCSVData[13],
                    "transaction_id" => $ordersCSVData[14],
                    "payment_amt_cents" => $ordersCSVData[15],
                    "ship_charged_cents" => $ordersCSVData[16],
                    "ship_cost_cents" => $ordersCSVData[17],
                    "subtotal_cents" => $ordersCSVData[18],
                    "total_cents" => $ordersCSVData[19],
                    "shipper_name" => $ordersCSVData[20],
                    "payment_date" => $ordersCSVData[21],
                    "shipped_date" => $ordersCSVData[22],
                    "tracking_number" => $ordersCSVData[23],
                    "tax_total_cents" => $ordersCSVData[24],
                    "created_at" => $ordersCSVData[25],
                    "updated_at" => $ordersCSVData[26],
                ]);

            }
            fclose($ordersCSV);

        }
    }
}
