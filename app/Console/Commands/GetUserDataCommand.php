<?php

namespace App\Console\Commands;

use App\Api\RandomUserApi;
use App\Repositories\UserDataRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class GetUserDataCommand extends Command
{
    protected $signature = 'user:data:get';

    protected $description = 'Get users data';

    private RandomUserApi $api;
    private UserDataRepository $userDataRepository;

    public function __construct(
        RandomUserApi $api,
        UserDataRepository $userDataRepository
    )
    {
        parent::__construct();
        $this->api = $api;
        $this->userDataRepository = $userDataRepository;
    }


    public function handle()
    {
        Cache::forget('users_data');

        collect($this->api->getData()->results)->each(
            fn($result) => $this->userDataRepository->store($result)
        );
    }
}
