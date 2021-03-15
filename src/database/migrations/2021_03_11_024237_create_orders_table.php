<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->foreignId("inventory_id");
            $table->string("street_address_1");
            $table->string("street_address_2");
            $table->string("city");
            $table->string("state");
            $table->string("country_code")->default("USA");
            $table->string("zip");
            $table->string("phone_number");
            $table->string("email");
            $table->string("name");
            $table->string("order_status");
            $table->text("payment_ref");
            $table->string("transaction_id");
            $table->integer("payment_amt_cents");
            $table->integer("ship_charged_cents");
            $table->integer("ship_cost_cents");
            $table->integer("subtotal_cents");
            $table->integer("total_cents");
            $table->text("shipper_name");
            $table->dateTime("payment_date");
            $table->dateTime("shipped_date");
            $table->text("tracking_number");
            $table->integer("tax_total_cents");
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
