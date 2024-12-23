<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;


class MobileAuth
{

    function __construct(UsersController $usersController)
    {
        $this->UsersController = $usersController;
    }

    protected $UsersController;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        // if ($request->session()->missing('user_data')) {

        //     $code = 403;
        //     $message = 'Forbidden';

        //     return response()->view('response/response', ['message' => $message, 'code' => $code]);
        // }

        // cek data user
        // $UserId = $request->session()->get('user_data')['id'];
        $userData = $request->session()->get('user_data');
        $userId = $userData['id'] ?? null;
        if ($userId == null) {
            return $next($request);
        }
        $result = $this->UsersController->check_interest($userId);
        if (!$result) {
            return redirect()->route("view_mobile_interest");
        } else {
            return $next($request);
        }
    }
}
