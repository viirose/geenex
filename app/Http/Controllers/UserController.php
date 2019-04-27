<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Auth;
use Session;

use App\User;
use App\Forms\PasswordForm;
use App\Forms\ContactForm;

class UserController extends Controller
{
    use FormBuilderTrait;

    /**
     * Index
     *
     */
    public function index()
    {
        $records = User::all();

        return view('users.list', compact('records'));

    }

        // lock 锁定
    public function lock($id)
    {
        User::findOrFail($id)->update(['auth->locked' => true]);
        return redirect()->back();
    }

    // lock 解锁
    public function unlock($id)
    {
        User::findOrFail($id)->update(['auth->locked' => false]);
        return redirect()->back();
    }


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

    /**
    * 联系方式
    *
    */
    public function contactCreate()
    {
        $form = $this->form(ContactForm::class, [
            'method' => 'POST',
            'url' => '/users/contact/store'
        ]);

        $title = 'Contact';
        $icon = 'address-card-o';

        return view('form', compact('form','title','icon'));
    }

    /**
    * 保存
    *
    */
    public function contactStore(Request $request)
    {
        $array = [

            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company' => $request->company,
            'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
    
        ];

        Auth::user()->update(['contact_verified_at' => now(), 'info->contact' => json_encode($array)]);

        $path = '/';

        if(Session::has('target_url')) $path = session('target_url');
        Session::forget('target_url');

        return redirect($path);
    }
}


















