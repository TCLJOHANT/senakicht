<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  
    public function index()
    {
        return Comment::all();
    }

    
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->description = $request->description;
        $comment->user_id = $request->user_id;
        $comment->save();
        
        return $comment;
        
    }

    
    public function show(Comment $comment)
    {
        return $comment;
    }

    public function update(Request $request, Comment $comment)
    {
   
        $comment->description = $request->description;
        $comment->update();
        return $comment;
    }

   
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return [];
    }
}
