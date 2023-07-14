<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CryptController;
use App\Models\LoginLogs;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthMobileController extends Controller
{
    public $crypt;
    function __construct()
    {
        $this->crypt = new CryptController();
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.string' => 'Email tidak valid',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password tidak valid',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                "status" => false,
                "message" => "Email tidak ditemukan"
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {

            return response()->json([
                "status" => false,
                "message" => "Password atau email salah, perhatikan kembali data yang anda inputkan"
            ]);
        } else {

            //jika pengguna belum terverifikasi
            // if ($user->email_verified_at == null) {

            //     return response()->json([
            //         'status' => false,
            //         "message" => "Anda belum melakukan verifikasi email."
            //     ]);
            // }

            $token = $this->crypt->crypt(Carbon::now());

            // Simpan Login Logs berserta token
            LoginLogs::create([
                'user_id' => $user->id,
                'token' => $token,
                'devices' => $_SERVER['HTTP_USER_AGENT'],
                'status' => 1
            ]);

            return $this->respondWithToken($token, $user);
        }
    }


    public function logout(Request $request)
    {
        try {

            $setStatusToFalse = LoginLogs::where('user_id', $request->user['id'])->where('token', $request->access_token)->first();

            $setStatusToFalse->update([
                "status" => 0
            ]);

            if ($setStatusToFalse) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil Log Out'
                ], 200);
            }

            return response()->json([
                'status' => false,
                'message' => 'Gagal Log Out'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getUser(Request $request)
    {
        $user = User::find($request->user['id']);

        if ($user) {
            return response()->json([
                "status" => true,
                "data" => $user
            ], 200);
        }

        return response()->json([
            "status" => false,
            "message" => 'Pengguna tidak terdaftar atau tidak ditemukan'
        ], 404);
    }

    public function registration(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email tidak boleh kosong',
            'email.string' => 'Email tidak valid',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password tidak valid',
        ]);

        //cek if email already exist
        $cekEmail = User::where('email', $request->email)->first();
        if ($cekEmail) {
            return response()->json([
                "status" => false,
                "message" => 'Email yang diinputkan sudah terdaftar !'
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {

            $user->assignRole('Customer');

            return response()->json(([
                'status' => true,
                'data' => $user,
                'message' => 'Berhasil registrasi akun',
            ]));
        }

        return response()->json(([
            'status' => false,
            'message' => 'Gagal registrasi akun'
        ]));
    }


    protected function respondWithToken($token, $user)
    {

        $data['access_token'] = $token;
        $data['user'] = $user;
        $data['expired_at'] = Carbon::now()->addDay();

        $stringiFy = json_encode($data);
        $tokenCrypt = $this->crypt->crypt($stringiFy);

        return response()->json([
            'status' => true,
            'access_token' => $tokenCrypt,
            'expired_at' => $data['expired_at'],
        ], 200);
    }

    /**
     * checkToken memeriksa token
     *
     * @param  mixed $request
     * @return void
     */
    public function checkToken(Request $request)
    {
        $token = $this->crypt->crypt($request->token, 'd');
        $decode_json_data = json_decode($token);

        if ($decode_json_data) {

            $isExpired = Carbon::now() >= $decode_json_data->expired_at;

            if ($isExpired) {
                return response()->json([
                    'status' => false,
                    'isExpired' => true,
                    'message' => 'Token Sudah Expired, Silahkan login kembali'
                ], 200);
            }

            return response()->json([
                'status' => true,
                'isExpired' => false,
                'message' => 'Token Sudah Expired, Silahkan login kembali'
            ], 200);
        }
    }

    public function editnumber(Request $request)
    {
        $number = $request->nomerbaru;

        $check = User::where('phone_number', $number)->first();
        if ($check) {
            return response()->json([
                'status' => false,
                'message' => 'nomor tidak uniq'
            ]);
        }

        $user = User::where('id', $request->user['id'])->update([
            'phone_number' => $number
        ]);


        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'Nomor kontak berhasil di ubah'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Nomer gagal dirubah'
        ]);
    }
}
