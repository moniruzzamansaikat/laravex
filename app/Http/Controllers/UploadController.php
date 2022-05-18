<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        return view('front.upload.index');
    }

    public function store(Request $request) {
        $this -> validate($request, [
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('file');
        $name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $name);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('file',$name);
    }
}
