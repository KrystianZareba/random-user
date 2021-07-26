<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserDataRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserDataController extends Controller
{
    private UserDataRepository $userDataRepository;

    public function __construct(UserDataRepository $userDataRepository)
    {
        $this->userDataRepository = $userDataRepository;
    }

    public function index(): JsonResponse
    {
        $usersData = Cache::get('users_data');

        if($usersData === null) {
            $usersData = $this->userDataRepository->index();
            Cache::put('users_data', $usersData);
        }


        return response()->json($usersData);
    }
}
