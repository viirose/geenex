<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Mail;

use App\Mail\OrderShipped;
use App\Product;

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
        Mail::to(config('mail.reply_to.address'))->send(new OrderShipped($request));
    }



}





















