<?php


namespace App\Repositories\Database;


use Illuminate\Support\Facades\DB;

class ProductsRepository {

    public function all() {
        return DB::table("products")->get();
    }

    public function allWithPagination(int $items) {
        return DB::table("products")->paginate($items);
    }
}
