<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function checkCurrent(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $hashedPassword = $user['password'];

        $inputPassword = $request->input('currentPassword');

        $passwordCheck = 'false';
        if (Hash::check($inputPassword, $hashedPassword)===true) {
            $passwordCheck = 'true';
        }
        //var_dump(Hash::check($inputPassword, $hashedPassword));
        return $passwordCheck;
    }

    public function changePassword(Request $request, $id) {

        $this->validate($request, [
            'new' => 'required|min:6',
        ]);

        $password = $request->input('new');

        $user = User::find($id);
        $user->update([
            'password' => Hash::make($password),
        ]);
        $user->save();

        return 'true';
    }
}
