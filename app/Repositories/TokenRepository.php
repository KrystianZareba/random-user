<?php

namespace App\Repositories;

use App\Models\Token;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TokenRepository
{
    public function storeRandomForChannel(string $client): Model|Token|bool
    {
        if(Token::where('client', $client)->first())
            return false;

        return Token::create([
            'client' => $client,
            'token' => $this->generateToken()
        ]);
    }

    public function tokenExist(string $client, string $token): Model|Token|null
    {
        return Token::where('client', $client)->where('token', $token)->first();
    }

    private function generateToken(int $length = 100): string
    {
        return Str::random($length);
    }
}
