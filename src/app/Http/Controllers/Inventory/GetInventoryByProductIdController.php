<?php


namespace App\Http\Controllers\Inventory;


use App\Exceptions\Database\NoInventoryException;
use App\Http\Controllers\Controller;
use App\Services\Database\InventoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetInventoryByProductIdController extends Controller {

    public function __invoke(Request $request, InventoryService $inventoryService, int $id) {
        if (!$request->session()->has("user")){
            return redirect("login");
        }
        try {
            $inventory = $inventoryService->find(["userFriendly" => true, "productId" => $id]);
        } catch (NoInventoryException $e) {
            Log::error($e->getMessage());
            return view("inventory.inventoryByProductId", ["inventory" => [], "error" => "Not a valid Product Id"]);
        }

        return view("inventory.inventoryByProductId",["inventory" => $inventory]);
    }

}
