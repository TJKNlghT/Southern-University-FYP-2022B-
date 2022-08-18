<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function view() {
        $product = Product::all();

        return view('admin.showProduct')->with('products', $product);
    }

    public function add(){
        $categories = Category::get();
        
        return view('admin.defaultaddproducts')->with('categories', $categories);
    }

    public function store(Request $request) {
        $name = Product::get();

        $formFields = $request->validate([
            'name' => 'required',
            'description' => ['required'],
            'price' => 'required',
            'categoryName' => 'required'
        ]);


        if($request->hasFile('image')){
            $image=$request->file('image');
            $image->move('images',$image->getClientOriginalName());   //images is the location                
            $imageName=$image->getClientOriginalName();

            $formFields['image'] = $imageName;
        }

        Product::create($formFields);

        Session::flash('success', 'Item created successfully!');

        return redirect()->route('viewAdminProduct');
    }

    public function delete($id){
        $item = Product::find($id);
        $imagePath = public_path().'/images/'.$item->image;

        if(File::exists($imagePath)){
            File::delete($imagePath);
        }

        $item->delete();

        Session::flash('danger', 'Item deleted successfully!');

        return redirect()->route('viewAdminProduct');
    }

    public function edit($id){
        $categories = Category::get();
        $edit = Product::find($id);

        return view('admin.defaulteditproducts')->with('products', $edit)->with('categories', $categories);
    }

    public function update(Request $request) {

        $formFields = $request->validate([
            'name' => 'required',
            'description' => ['required'],
            'price' => 'required',
            'categoryName' => 'required'
        ]);


        if($request->hasFile('image')){
            $item = Product::find($request->productId);
            $imagePath = public_path().'/images/'.$item->image;

            if(File::exists($imagePath) && $item->image!=null){
                unlink($imagePath);
            }

            $image=$request->file('image');
            $image->move('images',$image->getClientOriginalName());   //images is the location                
            $imageName=$image->getClientOriginalName();

            $formFields['image'] = $imageName;
        }

        $update = Product::where('id', $request->productId)
        ->update($formFields);

        Session::flash('success', 'Item updated successfully!');

        return redirect()->route('viewAdminProduct');
    }
}
