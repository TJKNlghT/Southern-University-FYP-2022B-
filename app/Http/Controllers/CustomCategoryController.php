<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class CustomCategoryController extends Controller
{

    public function view() {
        $category = CustomCategory::all();

        return view('admin.showCustomCategory')->with('categories', $category);
    }

    
    public function add(){
        return view('admin.customaddcategory');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('categories', 'name')],
        ]);

        CustomCategory::create($formFields);

        Session::flash('success', 'Category create successfully!');

        return redirect()->route('viewAdminCustomCategory');
    }

    public function delete($id) {
        $delete = CustomCategory::find($id)->delete();

        Session::flash('danger', 'Category deleted successfully!');

        return redirect()->route('viewAdminCustomCategory');
    }

    public function edit($id){
        $edit = CustomCategory::find($id);

        return view('admin.customeditcategory')->with('categories', $edit);
    }

    public function update() {
        $r = request();

        $update = CustomCategory::where('id', $r->categoryId)
        ->update([
            'name' => $r->name,
        ]);

        Session::flash('success', 'Category updated successfully!');

        return redirect()->route('viewAdminCustomCategory');
    }
}
