<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    //
    public function review(Request $request)
    {
        # code...
        if(!Session::user()){
            $imagesPath = null;
            if ($request->hasFile('image') 
                && $request->file('image')->isValid()) {
                // Nếu có thì thục hiện lưu trữ file vào public/images
                $image = $request->file('image');
                $extension = $request->image->extension();
    
                $fileName = 'image_' . time() . '.' . $extension;
                $image->move('products', $fileName);
                $imagesPath = 'products/' . $fileName;
            }
            // dd($request->url);
            $listProductImages = [];
            $files = $request->file('url');
            if($request->hasFile('url')) {
                foreach ($files as $file) {
                    // Nếu có thì thục hiện lưu trữ file vào public/url
                    // $image = $request->file('url');
                    $extension = $file->extension();
                    $fileName = 'url_' . time() . rand() . '.' . $extension;
                    $file->move('product_images', $fileName);
                    $listProductImages[] = 'product_images/' . $fileName;
                }
            }

                $commentInsert = [

                    'comment'=>$request->comment,
                    'rate'=>$request->rate,
                ];
                DB::beginTransaction();
                try{
                    Comment::create($commentInsert);
                    DB::commit();
                   return redirect()->back();
                }catch (\Exception $ex) {
                    // insert into data to table category (fail)
                    DB::rollBack();
                    Log::error($ex->getMessage());
                    return redirect()->back()->with('error', $ex->getMessage());
                }
        }else{
            return view('auth.login');
        }
    }
}
