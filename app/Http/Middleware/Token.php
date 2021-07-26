<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\TokenRepository;

class Token
{
    private TokenRepository $tokenRepository;

    public function __construct(TokenRepository $tokenRepository){
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        // Pre-Middleware Action
        if($this->tokenRepository->tokenExist($request->input('client', ''), $request->input('token', '')))
            return $next($request);

        return response()->json(['status' => 'error', 'error' => 'Not authorized.'],403);
    }
}
