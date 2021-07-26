<?php

namespace App\Console\Commands;

use App\Repositories\TokenRepository;
use Illuminate\Console\Command;

class CreateTokenCommand extends Command
{
    protected $signature = 'token:create {client}';

    protected $description = 'Create APP Token';

    private TokenRepository $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
        parent::__construct();
    }

    public function handle()
    {
        $client = $this->argument('client');

        if ($token = $this->tokenRepository->storeRandomForChannel($client))
            $this->line('Token for client ' . $client . ': ' . $token->token);
        else
            $this->line('Token for this client already exists');
    }
}
