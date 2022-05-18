<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(Request $request)
    {
        $request->user()->following()->toggle($request->follow_id);
        return back();
    }
}
