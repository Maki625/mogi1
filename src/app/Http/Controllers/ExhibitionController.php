<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ExhibitionController extends Controller
{
    public function create() {

        $categories = Category::all();

        return view('exhibition', ['categories' => $categories]);
    }
}
