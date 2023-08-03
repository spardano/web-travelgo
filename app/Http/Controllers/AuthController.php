<?php

namespace App\Http\Controllers;
use App\Models\EmailVerificationRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function verify($token){

        $check = EmailVerificationRequest::where('token', $token)->first();

        if(!$check){
            $data['message'] = 'Verifikasi email ini tidak valid, silahkan kirim kembali!';
            return view('errors.failed', $data);
        }

        $user = User::find($check->id_user);

        if($user->email_verified_at != null){
            $data['message'] = 'Sepertinya email kamu sudah diverifikasi!';
            return view('errors.failed', $data);
        }

        if(Carbon::now() >= $check->expired){
            $data['message'] = 'Verifikasi Email sudah kadaluarsa, silahkan kirim verifikasi email kembali!';
            return view('errors.failed', $data);
        }

        $user->email_verified_at = Carbon::now();
        $user->save();

        $data['message'] = 'Verifikasi Email berhasil dilakukam, silahkan login!';
        return view('errors.success', $data);
    }
}
