<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\JSONPlaceholder\JSONPlaceholder;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;
    protected  $userService;

    public function __construct(JSONPlaceholder  $service, UserService $userService)
    {
        $this->service=$service;
        $this->userService= $userService;
    }
    public function getAllUsers(){
        $data = $this->service->getAllUsers();
        return response()->json($this->userService->filterWomenAndMen($data));
    }
}
