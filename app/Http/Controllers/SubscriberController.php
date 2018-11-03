<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Show the subscriber page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subscriber');
    }


    public function get()
    {
        $subscribers = Subscriber::all();
        return response()->json(['subscribers' => $subscribers], 200);
    }
}
