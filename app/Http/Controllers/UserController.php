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
use App\Mail\AccountDelete;
use App\Mail\NewRegister;
use App\Mail\AccountActive;
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
    public function show(Role $role, $id=0)
    {
        if($id === 0) $id = Auth::id();

        if(!$role->gt($id) && !$role->self($id)) abort('403');

        $record = User::findOrFail($id);

        $contacts = [];
        $info = json_decode($record->info, true);
        if(isset($info['contact'])) $contacts = $info['contact']; 

        if(is_array($contacts)) ksort($contacts);

        return view('users.show', compact('record', 'contacts'));
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
            'auth->from' => 'created',
            'auth->must_rest_password' => true,
        ];

        if($request->spare) $new['auth->spare'] = true;

        $record = User::create($new);

        $message = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ];

        Mail::to($request->email)
                ->send(new Password($message));


        $text = 'A User has been created successfully!<br><a href="/users/contact/create/'.$record->id.'" class="btn btn-success btn-sm"> Update Contact</a>';
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
        if($request->password !== $request->confirm_password) redirect()->back()->withErrors(['confirm_password'=>'Two inconsistencies in password input!'])->withInput();

        Auth::user()->update([
            'password'=>bcrypt($request->password),
            'auth->must_rest_password' => false,
        ]);

        $text = 'Password Reset Succeed!';
        $color = 'success';
        $icon = 'check-square-o';
        return view('note', compact('text', 'color', 'icon'));
    }

    /**
    * 联系方式
    *
    */
    public function contactCreate($id=0)
    {
        $url = $id === 0 ? '/users/contact/store' : '/users/contact/store'.'/'.$id;

        $form = $this->form(ContactForm::class, [
            'method' => 'POST',
            'url' => $url,
        ]);

        $title = $id === 0 ? 'Contact <br><br><div class="alert alert-info"><small>This address will be used for your delivery and invoice address, you can edit or alter this after account creation in your address book.</small></div>' : 'Contact <br><br><div class="alert alert-success"><small>You will active the account directly by finishing this form.</small></div>';

        $icon = 'address-card-o';

        return view('form', compact('form','title','icon'));
    }

    /**
    * 保存
    *
    */
    public function contactStore(Request $request, $id=0)
    {
        $user = $id === 0 ? Auth::user() : User::findOrFail($id);

        $array = $request->except(['_token']);

        $all = [
            'contact_verified_at' => now(), 
            'info->contact' => $array
        ];

        if($id === 0)  $all['auth->need_active'] = true;

        $user->update($all);

        $text = $id === 0 ? 'Thanks for the update! Your account will be activated in 24 hours!.' : 'Success! The account has been activated!';

        // 发送邮件
        if($id === 0) {
            Mail::to(config('mail.reply_to.address'))
                ->send(new NewRegister($user));
        }

        $color = 'success';
        $icon = 'check-square-o';
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

        $record = User::findOrFail($id);

        Mail::to($record->email)
                ->send(new AccountDelete($record));

        $record->delete();
        
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

        echo $user->email;
        // if($role->needActive($user->id)) {
            // Mail::to($user->email)
            //     ->send(new AccountActive($user));
        // }

        // $user->update([
        //     'auth->limit' => $old,
        //     'auth->need_active' => false,
        // ]);

        // return redirect()->back();
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


    /**
     * 信息修改
     *
     */
    public function edit($id=0)
    {
        # code...
    }

    /**
     * 联系信息修改
     *
     */
    public function contactEdit($id=0)
    {
        $url = '/users/contact/update';

        if($id === 0) {
            $id = Auth::id();
        }else{
            $url .= '/'.$id;
        }

        $record = User::findOrFail($id);

        $info = json_decode($record->info, true);

        $contact = [];

        if(isset($info['contact'])) $contact = $info['contact'];

        $form = $this->form(ContactForm::class, [
            'method' => 'POST',
            'data' => ['contact' => $contact],
            'url' => $url
        ]);

        $title = 'Edit Contact: '.$record->name;
        $icon = 'address-card-o';

        return view('form', compact('form','title','icon'));
    }


    /**
     * 联系信息修改 - 保存
     *
     */
    public function contactUpdate(Request $request, $id=0)
    {
        if($id === 0) $id = Auth::id();

        $contact = $request->except(['_token']);

        $record = User::findOrFail($id);

        $record->update(['info->contact' => $contact]);

        $text = 'Success! Contact updated';
        $color = 'success';
        $icon = 'address-card-o';
        return view('note', compact('text', 'color', 'icon'));
    }
}


















