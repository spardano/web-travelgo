<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptController extends Controller
{
    public function crypt($string, $action = 'e')
    {
        $secret_key = 'aldianwillia';

        $secret_iv = 'tr4v3lG0m4ju4034';

        $output = false;

        $encrypt_method = "AES-128-CBC";

        $iv = substr($secret_iv, 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $secret_key, 0, $iv));
        } elseif ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $secret_key, 0, $iv);
        }

        return $output;
    }

    public static function staticCrypt($string, $action = 'e')
    {
        $secret_key = 'aldianwillia';

        $secret_iv = 'tr4v3lG0m4ju4034';

        $output = false;

        $encrypt_method = "AES-128-CBC";

        $iv = substr($secret_iv, 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $secret_key, 0, $iv));
        } elseif ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $secret_key, 0, $iv);
        }

        return $output;
    }
}
