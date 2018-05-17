<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMessage;
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
     * @param AddMessage $request
     *
     * @return $this
     */
    public function postAddMessage(AddMessage $request)
    {
        $validate = $request->validated();

        Message::create([
            'message' => $validate['message'],
            'user_id' => \Auth::user()->id
        ]);

        return view('home');
    }
}
