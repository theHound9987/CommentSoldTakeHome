<?php

namespace App\Http\Controllers\Login;

use App\Exceptions\Database\NoUserFound;
use App\Http\Controllers\Controller;
use App\Services\Database\UserService;
use Illuminate\Http\Request;

class PostLoginController extends Controller {

    public function __invoke(Request $request, UserService $userService){

        if($request->session()->has("user")){
            return redirect("/home");
        }

        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        try {
            $user = $userService->find([
                    "email" => $request->input("email"),
                    "password" => $request->input("password")]
            );
        } catch (NoUserFound $e) {
            return back()->withInput()->withErrors([ "Nota a valid user"]);
        }

        $request->session()->put("user",$user);
        return redirect("home");
    }
}
