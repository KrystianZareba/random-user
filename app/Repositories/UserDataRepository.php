<?php

namespace App\Repositories;

use App\Models\UserData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserDataRepository
{
    /**
     * @return Collection|UserData[]
     */
    public function index(): Collection|array
    {
        return UserData::all();
    }

    public function store(mixed $data): Model|UserData
    {
        return UserData::create([
            'data' => $data
        ]);
    }
}
