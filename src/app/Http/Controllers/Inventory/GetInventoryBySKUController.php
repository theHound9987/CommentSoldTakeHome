<?php


namespace App\Http\Controllers\Inventory;


use App\Exceptions\Database\NoInventoryException;
use App\Http\Controllers\Controller;
use App\Services\Database\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetInventoryBySKUController extends Controller {

    public function __invoke(Request $request, InventoryService $inventoryService, string $sku) {
        if (!$request->session()->has("user")){
            return redirect("login");
        }
        try {
            $inventory = $inventoryService->find(["userFriendly" => true, "sku" => $sku]);
        } catch (NoInventoryException $e) {
            Log::error($e->getMessage());
            return view("inventory.inventoryBySKU", ["inventory" => [], "error" => "Not a valid SKU"]);
        }

        return view("inventory.inventoryBySKU", ["inventory" => $inventory]);

    }

}
