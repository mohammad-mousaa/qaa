<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            "post_id" => 'required',
        ]);

        $el = $request->all();
        $el['user_id'] = auth()->user()->id;
        Comment::create($el);

        return redirect()->route('posts.index')->with('success', 'comment create successfuly');

    }

}
