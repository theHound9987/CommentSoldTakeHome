<?php


namespace App\Http\Controllers;


use App\Services\Database\ProductService;
use Illuminate\Http\Request;

class GetProductsController extends Controller {

    public function __invoke(Request $request, ProductService $productService) {
        if (!$request->session()->has("user")){
            return redirect("login");
        }

        $products = $productService->allWithPagination(30);

        return view("products",["products" => $products,]);
    }
}
