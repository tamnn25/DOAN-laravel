<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Method: GET
        $data = [];

        $categories = Category::get();

        $data['categories'] = $categories;

        return view('admin.categories.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Method: GET
        $data = [];

        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // Method: POST
        // insert to DB
        $categoryInsert = [
            
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,

        ];

        DB::beginTransaction();

        try {
            Category::create($categoryInsert);

            // insert into data to table category (successful)
            DB::commit();

            return redirect()->route('admin.category.index')->with('sucess', 'Insert into data to Category Sucessful.');
        } catch (\Exception $ex) {
            // insert into data to table category (fail)
            DB::rollBack();
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Method: GET

        $data = [];
        
        $category = Category::findOrFail($id);

        $data['category'] = $category;

        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        // Method: PUT

        DB::beginTransaction();

        try {
            // create $category
            $category = Category::find($id);
            // set value for field name
            $category->name = $request->category_name;
            $category->parent_id = $request->parent_id;

            $category->save();
            
            DB::commit();

            return redirect()->route('admin.category.index')
                ->with('success', 'Update Category successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     // Method: DELETE
    //     DB::beginTransaction();

    //     try {
            
    //         $category = Category::find($id);

    //         if(!empty($category->products)){
    //             echo "You are can't delete this category.";
                
    //             // foreach ($category->products as $value){
    //             //     $value->delete();
    //             //     $category = Category::find($id);
    //                 // $category->delete();
    //             // }
    //         }else{
    //              $category->delete();
    //         }
    //         // dd($category->products);

    //         DB::commit();

    //         return redirect()->route('admin.category.index')
    //             ->with('success', 'Delete Category successful!');
    //     }  catch (\Exception $ex) {
    //         DB::rollBack();
    //         // have error so will show error message
    //         return redirect()->back()->with('error', $ex->getMessage());
    //     }
    // }
    public function destroy($id){
        $category = Category::find($id);
        // dd($category);
        if(isset($category->products)){
            dd($category->products);

            return redirect()->route('admin.category.index')
              ->with('error', 'Delete Category error!');
        }else{
            $category->delete();
            return redirect()->route('admin.category.index')
              ->with('success', 'Delete Category successful!');
        }
    }
}
