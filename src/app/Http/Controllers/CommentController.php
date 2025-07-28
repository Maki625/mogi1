<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $item_id)
{
    if (!auth()->check()) {
        return redirect();
    }

    Comment::create([
        'user_id' => auth()->id(),
        'product_id' => $item_id,
        'comment' => $request->comment,
    ]);

    return back();
}

}
