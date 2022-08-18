<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function view() {
        $category = Category::all();

        return view('admin.showCategory')->with('categories', $category);
    }

    
    public function add(){
        return view('admin.defaultaddcategory');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]);

        Category::create($formFields);

        Session::flash('success', 'Category create successfully!');

        return redirect()->route('viewAdminCategory');
    }

    public function delete($id) {
        $delete = Category::find($id);

        $categoryName = $delete->name;

        $product = Product::where('categoryName', $categoryName)
        ->update([
            'categoryName' => 'none',
        ]);

        $delete->delete();

        Session::flash('danger', 'Category deleted successfully!');

        return redirect()->route('viewAdminCategory');
    }

    public function edit($id){
        $edit = Category::find($id);

        return view('admin.defaulteditcategory')->with('categories', $edit);
    }

    public function update() {
        $r = request();

        $update = Category::where('id', $r->categoryId)
        ->update([
            'name' => $r->name,
        ]);

        Session::flash('success', 'Category updated successfully!');

        return redirect()->route('viewAdminCategory');
    }
}
