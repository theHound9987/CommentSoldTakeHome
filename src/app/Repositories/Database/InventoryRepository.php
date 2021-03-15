<?php


namespace App\Repositories\Database;


use App\Exceptions\Database\NoInventoryException;
use Illuminate\Support\Facades\DB;

class InventoryRepository {

    public function userFriendlyWithPaginationAll(int $items) {
        return DB::table("inventory AS i")
            ->join("products AS p", "p.id", "=", "i.product_id")
            ->groupBy(["i.product_id", "p.name"])
            ->select([
                "p.name",
                "i.product_id",
                DB::raw("SUM(i.quantity) AS totalQuantity"),
                DB::raw("GROUP_CONCAT(i.sku) AS skus"),
                DB::raw("GROUP_CONCAT(i.color) AS colors"),
                DB::raw("GROUP_CONCAT(i.size) AS sizes"),
                DB::raw("group_concat(i.price_cents) AS prices"),
                DB::raw("GROUP_CONCAT(i.cost_cents) AS costs"),
            ])->paginate($items, ["i.product_id"]);
    }

    public function userFriendlyByProductId(int $id) {
        $item =  DB::table("inventory AS i")
            ->join("products AS p", "p.id", "=", "i.product_id")
            ->groupBy(["i.product_id", "p.name"])
            ->select([
                "p.name",
                "i.product_id",
                DB::raw("SUM(i.quantity) AS totalQuantity"),
                DB::raw("GROUP_CONCAT(i.sku) AS skus"),
                DB::raw("GROUP_CONCAT(i.color) AS colors"),
                DB::raw("GROUP_CONCAT(i.size) AS sizes"),
                DB::raw("group_concat(i.price_cents) AS prices"),
                DB::raw("GROUP_CONCAT(i.cost_cents) AS costs"),
            ])
            ->where([["i.product_id", "=", $id]])->get();


        if($item->isEmpty()){
            throw new NoInventoryException("Could not find inventory product id: {$id}");
        }

        return $item;
    }

    public function userFriendlyBySKU(string $sku) {
        $item =  DB::table("inventory AS i")
            ->join("products AS p", "p.id", "=", "i.product_id")
            ->select([
                "p.name", "i.product_id", "i.quantity", "i.sku",
                "i.color", "i.size", "i.price_cents", "i.cost_cents",
            ])
            ->where([["i.sku", "=", $sku]])->get();


        if($item->isEmpty()){
            throw new NoInventoryException("Could not find inventory SKU: {$sku}");
        }

        return $item;
    }
}
