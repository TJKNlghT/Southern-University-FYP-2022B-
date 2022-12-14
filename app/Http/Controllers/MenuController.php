<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\FoodReview;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Models\CustomCategory;
use App\Models\OrderItems;

class MenuController extends Controller
{
    public function viewselectmenu(){
        return view('menus.selectmenu');
    }

    public function viewdefaultmenu() {
        $category = Category::all();
        $product = Product::where('categoryName', Category::first()->name)->paginate(18);

        return view('menus.defaultmenu', [
            'categories' => $category,
            'products' => $product
        ]);
    }

    public function viewProduct($id){
        $categoryId = Category::find($id);

        $category = Category::get();

        $categoryName = $categoryId->name;

        $product = Product::where('categoryName', $categoryName)->paginate(18);


        return view('menus.defaultmenu', [
            'categories' => $category,
            'products' => $product
        ]);
    }

    public function viewitem(Product $product){
        return view('menus.showitem', [
            'product' => $product
        ]);
    }

    //Custom Menu
    public function viewcustommenu(){
        $category = CustomCategory::all();
        $product = CustomProduct::all();
        return view('menus.custommenu',[
            'categories' => $category,
            'products' => $product
        ]);
    }

    public function sushicreation(){
        $r = request();
        $item = array();

        $total = 0;

        $categories = CustomCategory::all();

        foreach($categories as $category) {
            $categoryName = $category->name;

            if($r->$categoryName != null) {
                array_push($item, $r->$categoryName);
            }
        }

        $product = CustomProduct::all();

        foreach($item as $items) {
            foreach($product as $products) {
                if($products->name == $items) {
                    $total += $products->price;
                }
            }
        }

        $randomNumber = rand(1, 10000);

        return view('menus.sushiresult')->with('items', $item)
        ->with('products', $product)
        ->with('totals', $total)
        ->with('id', $randomNumber);
    }

    public function indexBeforeLogin()
    {
        $reviews = FoodReview::latest()->take(3)->get();

        return view('menus.index')->with('reviews', $reviews);
    }

    public function storeFoodReview(Request $request){
        
        $formFields = $request->validate([
            'name' => 'required',
            'rating' => 'required',
            'description'=> 'required',
        ]);

        FoodReview::create($formFields);

        return redirect()->route('indexBeforeLogin');
    }


    //Search Order
    public function searchtrackorder(){
        $r= request();

        $keyword = $r->searchemail;

        $order = OrderHistory::latest()
        ->where('email', $keyword)
        ->Where('status', '!=' , 'Completed')
        ->Where('status', '!=' , 'Cancelled')
        ->paginate(10);
        
        return view('menus.trackorder')->with('orders', $order);
    }

    //Search Order
    public function viewtrackorder(){
        $order = OrderHistory::where('status', 'nothing')->paginate(10);

        return view('menus.trackorder')->with('orders', $order);
    }

    public function viewsingletrackorder($id) {

        $viewOrder = OrderHistory::all()->where('orderid', $id);
        $viewOrderItems = OrderItems::all()->where('orderid', $id);

        $subTotal = 0;
        $total = 0;
        
        foreach($viewOrderItems as $item) {
            $subTotal += ($item->quantity * $item->price);
        }

        $total = $subTotal + 1.30;
        
        return view('menus.vieworder')->with('orderhistory', $viewOrder)
        ->with('orderhistoryitems', $viewOrderItems)
        ->with('total', $total)
        ->with('subtotal', $subTotal);
    }
}
