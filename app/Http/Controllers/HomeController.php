<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Страница окончания регистрации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function success()
    {
        return view('success');
    }

    /**
     * Обработка данных формы и добавление сообщений
     *
     * @param Request $request
     *
     * @return $this
     */
    public function postAddMessage(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'message' => [
                'required',
                'regex:/^.*\S.*$/u',
            ]
        ]);

        if (\Auth::check() && $validate->passes()) {
            $newMessage = new Message();
            $newMessage->message = $request->input('message');
            $newMessage->user_id = \Auth::user()->id;
            $newMessage->save();
        }

        return view('home')->withErrors($validate->errors());
    }
}
