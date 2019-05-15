<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Mail;
use Auth;

use App\Mail\OrderShipped;
use App\Product;
use App\Inquiry;

class OrderController extends Controller
{
    // private $list;

    function __construct()
    {
        if(!Session::has('inquiries')) session(['inquiries' => [] ]);
    }

    /**
     * 咨询列表
     *
     */
    public function inquiries()
    {

        $records = Product::whereIn('id', session('inquiries'))->get();

        return view('inquiries.list', compact('records'));
    }

    /**
     * 增加
     *
     */
    public function add($id)
    {
        $array = session('inquiries');

        if(!in_array($id, $array)) {
            array_push($array, $id);
            session(['inquiries' => $array]);
        }

        return redirect()->back();
    }

    /**
     * 删除
     *
     */
    public function delete($id)
    {
        $array = session('inquiries');

        if(in_array($id, $array)) {
            array_splice($array, array_search($id, $array), 1);
            session(['inquiries' => $array]);
        }

        return redirect()->back();
    }

    /**
     * 清除
     *
     */
    public function clear()
    {
        if(Session::has('inquiries')) Session::forget('inquiries');
        return redirect()->back();
    }


    /**
     * 邮件
     *
     */
    public function send(Request $request)
    {
        Mail::to(config('mail.reply_to.address'))
                ->cc('309266143@qq.com')
                ->send(new OrderShipped($request));

        Inquiry::create([
            'user_id' => Auth::id(),
            'product_ids' => json_encode(session('inquiries')),
            'message' => $request->message,
        ]);

        if(Session::has('inquiries')) Session::forget('inquiries');

        $text = 'your email has been send successfully!';
        $color = 'success';
        $icon = 'paper-plane-o';
        return view('note', compact('text', 'color', 'icon'));
    }


    public function show($id=0)
    {
        if($id === 0) $id = Auth::id();

        $records = Inquiry::where('user_id', $id)->latest()->paginate(30);

        return view('inquiries.show', compact('records'));
    }

}





















