<?php


namespace App\Http\Controllers\Login;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetLoginController extends Controller {

    public function __invoke(Request $request) {
        if ($request->session()->has("user")){
            return redirect("home");
        }
        return view("login");
    }

}
