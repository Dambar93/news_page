<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request, int $id)
    {
        $data = $request->validate(
            [
            'email' => 'required|email:rfc,dns',
            'comment' => 'required',
            ]
        );
        $data['news_id'] = $id;
        $comment = Comment::create($data);
        $comment -> save();

        return redirect(route('news.show', $id))
            ->with('success', 'Comment created successfully!');
    }
}
