<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $getCategories = Category::paginate(15);
        return view('category.index', [
            'categories' => $getCategories
        ]);
    }

    /**
     * @param CategoryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $getData = Category::where('id', $id)->firstOrFail();
        return view('category.edit', [
            'data' => $getData
        ]);

    }

    public function update(CategoryStoreRequest $request, $id)
    {
        $getData = Category::where('id', $id)->firstOrFail();
        $getData->update($request->validated());
        return redirect()->route('category.index')->with('success', 'Category update successfully.');
    }

    public function delete($id)
    {
        $getData = Category::where('id', $id)->firstOrFail();
        $getData->delete();
        return redirect()->route('category.index')->with('success', 'Category data deleted successfully.');
    }
}