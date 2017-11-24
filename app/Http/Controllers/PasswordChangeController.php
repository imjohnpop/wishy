<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasswordChangeController extends Controller
{
    public function checkCurrent()
    {
        $user = User::find(Auth::user()->id);
        $hashedPassword = $user->password;

        $inputPassword = $_GET['currentPassword'];

        $passwordCheck = false;
        if (Hash::check($inputPassword, $hashedPassword)) {
            $passwordCheck = true;
        }

        return $passwordCheck;
    }
}
