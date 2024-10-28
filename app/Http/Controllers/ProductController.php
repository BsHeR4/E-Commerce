<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'check-isAdmin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $categories = Category::all();

        if(isset($request->product_name))
        {
            $products = Product::where('name', 'like', '%' . $request->product_name . '%')->get();
        }
        elseif($request->category_id)
        {
            $category = Category::find($request->category_id);
            $products = $category->products;
        }
        else
        {
            $products = Product::all();
        }
        return view('admin.product.list_products', [
            'products' => $products,
            'categories' => $categories,
            'category_id' => $request->category_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.product.add_product', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $path = uploadImage($file, "uploads/product_images");
        }
        $product = Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'amount' => $request->amount,
            'image_path' => $path,
            'availability' => $request->has('availability'),
        ]);

        $product->categories()->attach($request->categories_ids);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('admin.product.show_product', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('admin.product.edit_product', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $input = $request->all();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = uploadImage($file, "uploads/product_images");
            $input['image_path'] = $path;
        }
        else
        {
            $input['image_path'] = $product->image_path;
        }
  
    
        $input['availability'] = $request->has('availability');
        $product->update($input);
        $product->categories()->sync($request->categories_ids);
    
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index');
    }

    public function restore(string $id)
    {

        Product::withTrashed()->find($id)->restore();
        return redirect()->route('products.trashed');
    }

    public function forceDelete(string $id, $routeName)
    {

        $product = Product::withTrashed()->find($id);
        Storage::disk('public')->delete($product->image_path);
        $product->forceDelete();
        if ($routeName == 'products.index')
            return redirect()->route('products.index');
        if ($routeName == 'products.show')
            return redirect()->route('products.index');

        return redirect()->route('products.trashed');
    }

    public function trashedProducts(Request $request)
    {

        $products = Product::onlyTrashed()->get();

        return view('admin.product.trashed_products', [
            'products' => $products,
        ]);
    }
}
