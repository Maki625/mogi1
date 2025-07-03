<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {

        return view('edit');
    }

    //更新処理
    public function update() {

    }
}
