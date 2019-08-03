<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Kris\LaravelFormBuilder\FormBuilderTrait;

use App\Forms\PubForm;
use App\Forms\PasswordForm;
use App\Mail\QuickMail;
use App\Article;
use Auth;

class HomeController extends Controller
{
    use FormBuilderTrait;

    /**
     * home 
     *
     */
    public function index()
    {
        $records = Article::latest()->paginate(10);

        return view('home', compact('records'));
        // $form = $this->form(QuickContactForm::class, [
        //     'method' => 'POST',
        //     'url' => '/contact/quick'
        // ]);

        // return view('home', compact('form'));
    }

    public function etf()
    {
        return view('etf');
    }

    public function kcb()
    {
        return view('kcb');
    }

    public function sc()
    {
        return view('sc');
    }

   

    public function pub()
    {
        $form = $this->form(PubForm::class, [
            'method' => 'POST',
            'url' => '/pub/store'
        ]);

        $title = '文章发布';
        $icon = 'edit';

        return view('form', compact('form','title','icon'));
    }


    public function store(Request $request)
    {
        Article::create($request->all());
        return redirect('/');
    }


    public function show($id)
    {
        $record = Article::find($id);

        if(!$record) return redirect('/pubs');

        return view('show',compact('record'));
    }

    public function all()
    {
        $records = Article::latest()->paginate(100);

        return view('all', compact('records'));
    }

    public function delete($id)
    {
        $record = Article::findOrFail($id);

        $record->delete();

        return redirect('/articles');
    }

    public function quit()
    {
        Auth::logout();
        return redirect('/');
    }


    public function reset()
    {
        $form = $this->form(PasswordForm::class, [
            'method' => 'POST',
            'url' => '/reset_save'
        ]);

        $title = '密码修改';
        $icon = 'key';

        return view('form', compact('form','title','icon'));
    }

    public function save(Request $request)
    {
        $form = $this->form(PasswordForm::class);
        if($request->password !== $request->confirm_password) return redirect()->back()->withErrors(['confirm_password'=>'密码不一致!'])->withInput();
        Auth::user()->update(['password'=>bcrypt($request->password)]);

        $text = '密码修改成功!';
        return view('note', compact('text'));
    }

    // /**
    //  * quick mail
    //  *
    //  */
    // public function quick(Request $request)
    // {
    //     Mail::to(config('mail.reply_to.address'))
    //             ->cc('309266143@qq.com')
    //             ->send(new QuickMail($request));

    //     $text = 'your email has been send successfully!';
    //     $color = 'success';
    //     $icon = 'paper-plane-o';
    //     return view('note', compact('text', 'color', 'icon'));
    // }
}
