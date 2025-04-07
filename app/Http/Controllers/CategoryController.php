<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create ');
    }

    public function store(CategoryRequest $request)
    {

        // $request->validate([
        //     'name' => 'required|string',
        //     'slug' => 'required|string|unique:categories,slug',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);


        // $category = new Category();

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = $request->slug . '_' . time() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('category', $filename, 'public');
        //     $category->image =  $path;
        // }

        // $category->name = $request->name;
        // $category->slug = $request->slug;
        // $category->save();

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->slug . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('category', $filename, 'public');
            $data['image'] =  $path;
        }
        Category::create($data);
        session()->flash('success', 'Category created successfully');
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'slug' => 'required|string|unique:categories,slug,' . $id,
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $category = Category::findOrFail($id);
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $filename = $request->slug . '_' . time() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('category', $filename, 'public');
        //     // Delete Old Image
        //     if ($category->image) {
        //         unlink(public_path('storage/' . $category->image));
        //     }
        //     $category->image =  $path;
        // }
        // $category->name = $request->name;
        // $category->slug = $request->slug;
        // $category->update();


        $category = Category::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->slug . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('category', $filename, 'public');
            // Delete Old Image
            if ($category->image) {
                unlink(public_path('storage/' . $category->image));
            }
            $data['image'] =  $path;
        }
        $category->update($data);
        session()->flash('success', 'Category updated successfully');

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        if ($category->image) {
            unlink(public_path('storage/' . $category->image));
        }
        $category->delete();
        session()->flash('success', 'Category deleted successfully');
        return redirect()->route('category.index');
    }

    public function status($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->update();
        session()->flash('success', 'Category status updated successfully');
        return redirect()->route('category.index');
    }
}
