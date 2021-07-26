<?php

namespace App\Api;

use Illuminate\Support\Facades\Http;

class RandomUserApi
{
    private const API_URL = 'https://randomuser.me/api?results=10';

    public function getData(): object
    {
        return Http::get(self::API_URL)->object();
    }
}
