<?php


namespace App\Services\Database;


use App\Exceptions\Database\NoUserFound;
use App\Repositories\Database\UserRepository;

class UserService {

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function find(array $parms) {
        $returnValue = null;
        if(!empty($parms["email"]) && !empty($parms["password"])){
            $parms["passwordHash"] = bcrypt($parms["password"]); // php bycrypt didnt match
            $returnValue = $this->userRepository->findByEmailPassword($parms['email'], $parms['password']);
        }

        if(is_null($returnValue)){
            throw new NoUserFound("User not found parameters passed:" . $parms);
        }

        return $returnValue;
    }
}
