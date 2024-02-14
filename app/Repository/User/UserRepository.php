<?php

namespace App\Repository\User;

use App\Services\User\UserService;
use Illuminate\Support\Collection;

class UserRepository implements UserService
{

    public function filterWomenAndMen(Collection $users)
    {
       $women=new Collection();
       $men= new Collection();
       foreach ($users as $user){

           ($user->sex)? $men->push($user): $women->push($user);
       }
       return [
           'women'=>$women,
            'men'=>$men
       ];
    }
}
