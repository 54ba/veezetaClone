<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['logout']]);
        $this->middleware('hospitalization.auth', ['only' => ['hospitalizationLogout']]);

    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard()->logout();

        return response()
            ->json(['message' => 'Successfully logged out']);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function hospitalizationLogout()
    {
        Auth::guard('hospitalization')->logout();

        return response()
            ->json(['message' => 'Successfully logged out']);
    }
}
