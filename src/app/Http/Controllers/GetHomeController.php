<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GetHomeController extends Controller {

    public function __invoke(Request $request) {

        if (!$request->session()->has("user")){
            return redirect("login");
        }

        return view("home");
    }
}
