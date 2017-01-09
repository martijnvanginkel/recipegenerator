<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Recipe;

class CommentsController extends Controller
{
    //plaatsen van reactie op home pagina
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

    //bewerken reactie op user pagina
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->with('comment', $comment);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'comment' => 'required',
        ]);

        $comment = Comment::find($id);

        $comment->comment = $request->comment;

        $recipe->comments()->save($comment);

        return redirect()->route('users.index');
    }

    //verwijderen van reactie op user pagina
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('users.index');
    }
}
