<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Auth;

use App\Forms\PasswordForm;

class UserController extends Controller
{
    use FormBuilderTrait;

    /**
     * Login
     *
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * 修改密码
     *
     */
    public function resetPassword()
    {
        $form = $this->form(PasswordForm::class, [
            'method' => 'POST',
            'url' => '/users/save_password'
        ]);

        $title = 'Reset Password';
        $icon = 'key';

        return view('form', compact('form','title','icon'));
    }

    /**
     * 保存密码
     *
     */
    public function savePassword(Request $request)
    {
        $form = $this->form(PasswordForm::class);
        if($request->password !== $request->confirm_password) redirect()->back()->withErrors(['confirm_password'=>'密码不一致!'])->withInput();
        Auth::user()->update(['password'=>bcrypt($request->password)]);

        $text = 'success!';
        return view('note', compact('text'));
    }
}

















