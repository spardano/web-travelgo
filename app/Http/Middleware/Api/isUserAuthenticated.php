<?php

namespace App\Http\Middleware\Api;

use App\Http\Controllers\CryptController;
use App\Models\LoginLogs;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUserAuthenticated
{
    public $crypt;
    function __construct()
    {
        $this->crypt = new CryptController;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {

            $token_key = $this->crypt->crypt($request->header('authorization'), 'd');
            $decode_json_data = json_decode($token_key);

            $access_token = $decode_json_data->access_token;


            $loginLogs = LoginLogs::where('user_id', $decode_json_data->user->id)
                ->where('token', $access_token)
                ->where('status', 1)
                ->first();


            if ($loginLogs) {

                $isExpired = Carbon::now() >= $decode_json_data->expired_at;

                if ($isExpired) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Token Sudah Expired, Silahkan login kembali'
                    ], 401);
                }

                $request->merge(['user' => collect($decode_json_data->user)]);
                $request->merge(['access_token' => $access_token]);

                return $next($request);
            } else {

                return response()->json([
                    'status' => false,
                    'message' => 'Akses tidak valid'
                ], 403);
            }
        } catch (Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
