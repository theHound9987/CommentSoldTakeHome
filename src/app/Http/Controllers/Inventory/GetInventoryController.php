<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Services\Database\InventoryService;
use Illuminate\Http\Request;

class GetInventoryController extends Controller {

    public function __invoke(Request $request, InventoryService $inventoryService) {

        if (!$request->session()->has("user")){
            return redirect("login");
        }

        $inventory = $inventoryService->find(["userFriendly" => true, "pagination" => 20]);

        return view("inventory.inventory", ["inventory" => $inventory]);
    }
}
