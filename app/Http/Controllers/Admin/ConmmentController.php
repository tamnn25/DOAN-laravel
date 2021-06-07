<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class ConmmentController extends Controller
{
    //
    public function index(){
        $comment = Comment::get();
        
        return view('admin.comment.index')->with([
            'comment' => $comment,
        ]);
    }
}
