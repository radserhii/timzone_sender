<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function index()
    {
        return view('campaign');
    }

    public function get()
    {
        $campaigns = Campaign::all();
        return response()->json(['campaigns' => $campaigns], 200);
    }

    public function save(Request $request)
    {
        Campaign::create($request->all());
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        Campaign::destroy($id);
    }
}
