<?php

namespace App\Services\User;

use Illuminate\Support\Collection;
use App\Models\User;

interface UserService
{
    /**
     * @param Collection<User> $users
     */
    public function filterWomenAndMen(Collection $users);
}
