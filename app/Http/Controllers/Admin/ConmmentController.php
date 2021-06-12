<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB ;

class ConmmentController extends Controller
{
    //
    public function index(){
        $comment = Comment::with('product')->get();
        
        return view('admin.comment.index')->with([
            'comment' => $comment,
        ]);
    }
    public function destroy($id){
        // dd(123);
        DB::beginTransaction();
       
        try{
            $comment = Comment::find($id);
            $comment->delete();
            
            DB::commit();
            return redirect()->route('admin.comment.comment')
            ->with('success', 'Delete Category successful!');;
        }catch(\Exception $ex){
            echo $ex->getMessage();
        }
    }
}
