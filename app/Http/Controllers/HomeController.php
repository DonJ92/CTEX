<?php

namespace App\Http\Controllers;

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
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $balance_list = $this->getBalance();
        $last_news_list = $this->getLastNews();
        $last_notification_list = $this->getLastNotifications();

        $data['balance_list'] = $balance_list;
        $data['last_news_list'] = $last_news_list;
        $data['last_notifications_list'] = $last_notification_list;

        return view('home', $data);
    }
}
