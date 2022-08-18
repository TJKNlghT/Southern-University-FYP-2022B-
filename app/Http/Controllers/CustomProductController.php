<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Models\CustomCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CustomProductController extends Controller
{
    public function view() {
        $product = CustomProduct::all();

        return view('admin.showCustomProduct')->with('products', $product);
    }

    public function add(){
        $categories = CustomCategory::get();
        
        return view('admin.customaddproducts')->with('categories', $categories);
    }

    public function store(Request $request) {
        $name = CustomProduct::get();

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('products', 'name')],
            'price' => 'required',
            'categoryName' => 'required'
        ]);


        if($request->hasFile('image')){
            $image=$request->file('image');
            $image->move('images',$image->getClientOriginalName());   //images is the location                
            $imageName=$image->getClientOriginalName();

            $formFields['image'] = $imageName;
        }

        CustomProduct::create($formFields);

        Session::flash('success', 'Item created successfully!');

        return redirect()->route('viewAdminCustomProduct');
    }

    public function delete($id){
        $item = CustomProduct::find($id);
        $imagePath = public_path().'/images/'.$item->image;

        if(File::exists($imagePath)){
            unlink($imagePath);
        }

        $item->delete();

        Session::flash('danger', 'Item deleted successfully!');

        return redirect()->route('viewAdminCustomProduct');
    }

    public function edit($id){
        $categories = CustomCategory::get();
        $edit = CustomProduct::find($id);

        return view('admin.customeditproducts')->with('products', $edit)->with('categories', $categories);
    }

    public function update(Request $request) {

        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'categoryName' => 'required'
        ]);


        if($request->hasFile('image')){
            $image=$request->file('image');
            $image->move('images',$image->getClientOriginalName());   //images is the location                
            $imageName=$image->getClientOriginalName();

            $formFields['image'] = $imageName;
        }

        $update = CustomProduct::where('id', $request->productId)
        ->update($formFields);

        Session::flash('success', 'Item updated successfully!');

        return redirect()->route('viewAdminCustomProduct');
    }
}
