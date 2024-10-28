<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        if(isset($request->category_name))
        {
            $categories = Category::where('name', 'like', '%' . $request->category_name . '%')->get();
        }
        else
        {
            $categories = Category::all();
        }

        return view('admin.category.list_categories',[
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        $category->loadCount('products');
        $latestProducts = $category->products()->latest()->take(3)->get();
        return view('admin.category.show_category',[
            'category' => $category,
            'latestProducts' => $latestProducts,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit_category',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //
        $category->update([
            'name' => $request->name,
        ]);
        
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        
        return redirect()->route('categories.index');
    }
}
