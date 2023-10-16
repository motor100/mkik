<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function auth()
    {
        // Authentication Routes...
        $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        // $this->post('login', 'Auth\LoginController@login');
        $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        // $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        // $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        // $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        // $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        // $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        // $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    }

    public function login()
    {
        return view('auth.login');
    }

    // public function password()
    // {
    //     return view('auth.password');
    // }

}


