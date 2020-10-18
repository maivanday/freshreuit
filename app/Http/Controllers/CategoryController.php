<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Components\Recusive;

class CategoryController extends Controller
{
    private $category;
    public function __construct(category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(4);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('categories.index');
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    public function edit($id)
    {

        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,

        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
