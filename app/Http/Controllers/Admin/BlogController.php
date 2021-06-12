<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Blogdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data = [];
        $blogs = Blog::get();
        $data['blog'] = $blogs;
        return view('admin.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(StoreBlogRequest $request)
    {
        $imagesPath = null;
        if ($request->hasFile('image') 
            && $request->file('image')->isValid()) {
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('image');
            $extension = $request->image->extension();

            $fileName = 'image_' . time() . '.' . $extension;
            $image->move('blogs', $fileName);
            $imagesPath = 'blogs/' . $fileName;
        }
        // dd($request->url);
        $listblogimage = [];
        $files = $request->file('image_detail');
        if($request->hasFile('image_detail')) {
            foreach ($files as $file) {
                // Nếu có thì thục hiện lưu trữ file vào public/url
                // $image = $request->file('url');
                $extension = $file->extension();
                $fileName = 'image_detail_' . time() . rand() . '.' . $extension;
                $file->move('blog_imagedetail', $fileName);
                $listblogimage[] = 'blog_imagedetail/' . $fileName;
            }
        }

        $bloginsert = [
            'name' => $request->name ,
            'image' => $imagesPath,
            'content' => $request->content,
            'description' => $request->description,
        ];
        // dd($bloginsert);
     DB::beginTransaction();

        try {
            $blog = Blog::create($bloginsert);
                // save multiple image for table product_images

                if (!empty($listblogimages)) {
                    foreach ($listblogimages as $listblogimage) {
                        $listblogimage = new Blogdetail([
                            'image_detail'=> $listblogimage,
                            ]);
                            $blog->blog_detail()->save($listblogimage);
                        }
                    }
                    // dd($listblogimage); 
            DB::commit();
                return redirect()->route('admin.blog')->with('success','Insert successful!');
        } catch (\Exception $ex) {
            //throw $th;
            echo $ex->getMessage(); exit();

            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function detail($id)
    // {
    //     $data = [];
    //     $blog = Blog::find($id);
    //     $data['blog'] = $blog;
    //     return view('admin.blog.edit',$data);
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [];
        $blog = Blog::findOrFail($id);
        $data['blog'] = $blog;
        return view('admin.blog.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
