<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function show($item_id) {

        return view ('purchase', ['item_id' => $item_id]);

    }
}
