<?php

namespace App\Http\Livewire;

use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LoginCustomer extends Component
{
    public $name;
    public $email;
    public $password;
    public $access_token;
    public $isRegistrationEnabled = false;
    public $password_confirmation;

    public function render()
    {

        return view('livewire.login-customer');
    }

    public function login()
    {
        $client = new Client();

        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {

            $response = $client->request('POST', url('api/guest/login'), [
                'form_params' => [
                    'email' => $this->email,
                    'password' => $this->password,
                ],
            ]);

            $res = json_decode($response->getBody());

            if ($res->status) {
                $this->access_token =  $res->access_token;
                $user = $res->user;

                session()->put('id_cus', $user->id);
                session()->put('access_token', $this->access_token);
                session()->put('email_cus', $user->email);
                session()->put('nama_cus', $user->name);

                redirect()->to('/');
            } else {
                session()->flash('failed', $res->message);
            }
        } catch (Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }


    public function enableRegistration()
    {
        $this->isRegistrationEnabled = !$this->isRegistrationEnabled;
    }


    public function registrasi()
    {
        $client = new Client();

        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        try {

            $response = $client->request('POST', url('api/guest/register'), [
                'form_params' => [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password,
                ],
            ]);

            $res = json_decode($response->getBody());

            // dd($res);
            if ($res->status) {
                session()->flash('success', 'Berhasil melakukan registrasi, periksa kotak masuk email untuk verifikasi email!');
            } else {
                session()->flash('failed', $res->message);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            throw new HttpException(500, $e->getMessage());
        }
    }


    public function logout()
    {
        session()->forget('id_cus');
        session()->forget('access_token');
        session()->forget('email_cus');
        session()->forget('nama_cus');

        redirect()->to('/');
    }
}
