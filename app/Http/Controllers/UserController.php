<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Auth;
use Session;
use Mail;
use Illuminate\Support\Arr;

use App\User;
use App\Conf;
use App\Forms\PasswordForm;
use App\Forms\ContactForm;
use App\Forms\UserForm;
use App\Mail\Password;
use App\Helpers\Role;

class UserController extends Controller
{
    use FormBuilderTrait;

    /**
     * Index 
     *
     */
    public function index(Role $role)
    {
        if(!$role->admin()) abort('403');

        $records = User::where('id', '>', 1)
                        ->where(function ($query) {
                            if(Session::has('keywords_user')) {
                                $query->whereRaw('upper(email) like upper(?)', ['%'.session('keywords_user').'%'])
                                      ->orWhereRaw('upper(name) like upper(?)', ['%'.session('keywords_user').'%']);
                            }
                        })
                        ->orderBy('auth->root')
                        ->orderBy('auth->admin')
                        ->orderBy('auth->spare')  
                        ->oldest()  
                        ->paginate(50);

        return view('users.list', compact('records'));

    }

    /**
     * search
     *
     */
    public function search(Request $request)
    {
        session(['keywords_user' => $request->keywords]);

        return $this->index();
    }

    /**
     * show
     *
     */
    public function show($id, Role $role)
    {
        if(!$role->admin()) abort('403');

        $record = User::findOrFail($id);
        return view('users.show', compact('record'));
    }


    // lock 锁定
    public function lock($id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');

        User::findOrFail($id)->update(['auth->locked' => true]);
        return redirect()->back();
    }

    // lock 解锁
    public function unlock($id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');

        User::findOrFail($id)->update(['auth->locked' => false]);
        return redirect()->back();
    }

    /**
     * new User
     *
     */
    public function create(Role $role)
    {
        if(!$role->admin()) abort('403');

        $form = $this->form(UserForm::class, [
            'method' => 'POST',
            'url' => '/users/store'
        ]);

        $title = 'Create User';
        $icon = 'user-o';

        return view('form', compact('form','title','icon'));
    }

    /**
     * new User store
     *
     */
    public function store(Request $request, Role $role)
    {
        if(!$role->admin()) abort('403');

        $exists = User::where('email', $request->email)->first();
        if($exists) return redirect()->back()->withErrors(['email'=>'this Email has been taken!'])->withInput();

        $limit = $request->except(['_token', 'name', 'email']);

        // $brand_ids = array_values($limit);

        // print_r($brand_ids);

        $password = str_random(6);
        $password = strtolower($password);

        $new = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'email_verified_at' => now(),
            'auth->limit' => $limit,
        ];

        if($request->spare) $new['auth->spare'] = true;

        User::create($new);

        $message = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ];

        Mail::to($request->email)
                ->send(new Password($message));


        $text = 'A User has been created successfully!<br><a href="/users" class="btn btn-success btn-sm"> all users</a>';
        $color = 'success';
        $icon = 'user-o';
        return view('note', compact('text', 'color', 'icon'));
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

        $title = 'Contact <br><small>This address will be used for your delivery and invoice address, you can edit or alter this after account creation in your address book.</small>';
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
            'phone' => $request->phone,
            'street' => $request->street,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'country' => $request->country,
    
        ];

        Auth::user()->update(['contact_verified_at' => now(), 'info->contact' => json_encode($array)]);

        $text = 'Congratulations! You have send the contact infomaation, we will active your accout in 24 hours! Thank you!';
        $color = 'success';
        $icon = 'rocket';
        return view('note', compact('text', 'color', 'icon'));

        // $path = '/';

        // if(Session::has('target_url')) $path = session('target_url');
        // Session::forget('target_url');

        // return redirect($path);
    }


    // spare 锁定
    public function spareCancel($id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');

        User::findOrFail($id)->update(['auth->spare' => false]);
        return redirect()->back();
    }

    // spare 解锁
    public function spareGive($id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');

        User::findOrFail($id)->update(['auth->spare' => true]);
        return redirect()->back();
    }

    // delete
    public function delete($id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');
        
        User::findOrFail($id)->delete();
        return redirect('users');
    }

    // lock 锁定
    public function limit($id, $conf_id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');

        $conf = Conf::findOrFail($conf_id);
        $old = $role->limit($id);
        // $new = $old;
        if(!array_key_exists($conf->key, $old)) $old = array_add($old, $conf->id, $conf->key);

        $user = User::findOrFail($id);

        $user->update([
            'auth->limit' => $old,
        ]);

        return redirect()->back();
    }

    // lock 解锁
    public function unlimit($id, $conf_id, Role $role)
    {
        if(!$role->admin() || !$role->gt($id)) abort('403');

        $conf = Conf::findOrFail($conf_id);
        $old = $role->limit($id);

        if (array_key_exists($conf->id, $old)) $old = Arr::except($old, $conf->id);
        
        $user = User::findOrFail($id);

        $user->update([
            'auth->limit' => $old,
        ]);

        return redirect()->back();
    }
}


















