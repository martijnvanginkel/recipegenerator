<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Recipe;

class CommentsController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $user = Auth::user();


        $this->validate($request,
        [
            'comment' => 'required',
        ]);

        $comment = new Comment;

        $comment->name = $user->name;
        $comment->email = $user->email;
        $comment->comment = $request->comment;

        $recipe->comments()->save($comment);

        return back();
    }
}
