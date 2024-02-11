<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Categoryモデルを使用する場合


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required', // Add other validation rules as necessary
        ]);
        $data = $request->all();

        Category::create($data);
        return redirect()->route('categories')->with('登録完了！', 'カテゴリーが追加されました☺︎');
    }
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
        'name' => 'required', // Add other validation rules as necessary
        ]);
        $data = $request->all();

        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('categories')->with('登録完了！', 'カテゴリーが追加されました☺︎');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories')->with('削除完了！', 'カテゴリーが削除されました☺︎');
    }
}

        //dd($category);