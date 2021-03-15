<?php


namespace App\Repositories\Database;


use App\Exceptions\Database\NoUserFound;
use Illuminate\Support\Facades\DB;

class UserRepository {

    public function findByEmailPasswordPasswordHash(string $email, string $password, string $passwordHash) {
        $user = DB::table("users")->where([
            ["email", "=", $email],
            ["password_plain", "=", $password],
            ["password_hash", "=", $passwordHash],
        ])->get();

        if($user->isEmpty()){
            throw new NoUserFound("User not found with email: {$email}, password_plain: {$password}, password_hash {$passwordHash}");
        }
        return $user->first();
    }

    public function findByEmailPassword(string $email, string $password) {
        $user = DB::table("users")->where([
            ["email", "=", $email],
            ["password_plain", "=", $password],
        ])->get();

        if($user->isEmpty()){
            throw new NoUserFound("User not found with email: {$email}, password_plain: {$password}");
        }
        return $user->first();

    }
}
