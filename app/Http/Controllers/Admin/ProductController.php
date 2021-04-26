<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use App\Http\Requests\Admin\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $data = [];
        $product = Product::with('category');
        if (!empty($request->name)) {
            $product = $product->where('name', 'like', '%' . $request->name . '%');
        }
        
        // // search category_name
        if (!empty($request->category_id)) {
            $product = $product->where('category_id', $request->category_id);
        }

        $product = $product->orderBy('id', 'desc');

        // if(!empty($reques->name)){
        //     $products = products->where('name','like','%', $reques->name. '%');
        // }
        // if(!empty($reques->category_id)){
        //     $products
        // }
        $product = $product->paginate(3);
        // get list data of table categories
        $categories = Category::pluck('name')
           ->toArray();
           
        $data['categories'] = $categories;
        // dd($posts);
        $data['products'] = $product;

            return view('admin.products.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $products = Product::get();
        $data['products'] = $products;

        $categories = Category::pluck('name','id')->toArray();
        $data['categories'] = $categories;

        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
        
        $imagesPath = null;
        if ($request->hasFile('images') 
            && $request->file('images')->isValid()) {
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('images');
            $extension = $request->images->extension();

            $fileName = 'images_' . time() . '.' . $extension;
            $imagesPath = $image->move('storage/products', $fileName);
        }
        
        $dataInsert = [
            'name' => $request->name,
            'images' => $imagesPath,
            'price'=> $request->price,
            'hot'=> $request->hot,
            'quantity'=> $request->quantity,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];
        DB::beginTransaction();
        try {
            // insert into table posts
            $product = Product::create($dataInsert);

            // insert into table post_details
            // todo
            $productDetail = new ProductDetail([
                'content' => $request->content,
            ]);
            $product->Product_detail()->save($productDetail);

            DB::commit();

            // success
            return redirect()->route('admin.product.index')->with('success', 'Insert successful!');
        } catch (\Exception $ex) {
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
    public function show($id)
    {
        //
        $data = [];
        $product = Product::find($id);
        $data['product'] = $product;
        return view('admin.products.detail', $data);
    }

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
        $categories = Category::pluck( 'name','id')
            ->toArray();
        // $post = Post::find($id); // case 1
        $product = Product::findOrFail($id); // case 2
        $data['product'] = $product;
        $data['categories'] = $categories;
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        // em xu ly dang bi null cho nao vay . cai file em xu ly no cung mat luon roi thay.
        //no resset ve source cu do thay.
        // de em xu ly lai roi inbox thay sau. chu nhieu qua nhầm mất thầy
        //ok./da cảm on thay
        $product = Product::find($id);
        $productDetailId = $product->product_detail ? $product->product_detail->id : null;
        $imagesOld = $product->images;

        $imagesPath = null;
        if ($request->hasFile('images') 
            && $request->file('images')->isValid()) {
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('images');
            $extension = $request->images->extension();
            $fileName = 'images_' . time() . '.' . $extension;
            $imagesPath = $image->move('images', $fileName);

            $product->images = $imagesPath;
            Log::info('imagesPath: ' . $imagesPath);

        }
        // update data for table product
        $product->name = $request->name;
        $product->hot = $request->hot;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        
        // lưu bộ nhớ đệm, ko lưu vào DB.
        DB::beginTransaction();
        //dd($product);
        try {
            // update data for table posts
            $product->save();

            $dataDetailProduct = [
                'content' => $request->content,
                'product_id' => $id,
            ];

            // create or update data for table post_details
            if (!$productDetailId) { // create
                $productDetail = new ProductDetail($dataDetailProduct);
                $productDetail->save();
            } else { // update
                ProductDetail::find($productDetailId)
                    ->update($dataDetailProduct);
            }

            DB::commit();

            // SAVE OK then delete OLD file
            if (File::exists(public_path($imagesOld))){
                // && $request->hasFile('thumbnail') 
                // && $request->file('thumbnail')->isValid()) {
                File::delete(public_path($imagesOld));
            }

            // success
            return redirect()->route('admin.product.index')->with('success', 'Update successful!');
        } catch (\Exception $ex) {
            
            // DB::rollback();
            
            echo $ex->getMessage();
            // return redirect()->back()->with('error', $ex->getMessage());
            //return redirect()->route('product.index')->with('success', 'Update successful!');
        }
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
        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);
            $imagesOld = $product->images;
            $product->product_detail->delete();
            
            $product->delete();

            DB::commit();

            // DELETE OK then delete thumbnail file
            if (File::exists(public_path($imagesOld))) {
                File::delete(public_path($imagesOld));
            }

            // success
            return redirect()->route('admin.product.index')->with('success', 'Delete successful!');
        } catch (\Exception $ex) {
            echo $ex->getMessage();exit;
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}

