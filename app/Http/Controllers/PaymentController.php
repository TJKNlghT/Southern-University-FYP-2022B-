<?php

namespace App\Http\Controllers;

use Stripe;

use App\Models\Review;
use App\Models\OrderItems;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function viewpayment()
    {
        return view('menus.payment');
    }

    public function viewreceipt()
    {
        return view('menus.receipt');
    }

    //Payment

    public function paymentPost(Request $request)
    {
        $totalPrice = 0;

        $numberGenerator = random_int(1, 1000000);
        $randomNumber = $numberGenerator;

        $order = OrderHistory::get();

        foreach($order as $orders) {
            if ($numberGenerator == $orders->orderid) {
                do {
                    $numberGenerator = random_int(1, 1000000);
                } while ($numberGenerator != $orders->orderid);

                $randomNumber = $numberGenerator;
            } else {
                $randomNumber = $numberGenerator;
            }
        }

        $itemArray = explode(',', $request->itemArray);


        foreach($itemArray as $item) {
            $data = explode('/', $item);

            $itemName = $data[0];
            if(empty($data[1])) {
                $itemDesc = '';
            }else {
                $itemDesc = $data[1];
            }
            $itemPrice = $data[2];
            $itemQuantity = $data[3];

            $totalPrice += $itemPrice * $itemQuantity;


            $orderItem = OrderItems::create([
                'orderid' => $randomNumber,
                'name' => $itemName,
                'description' => $itemDesc,
                'price' => $itemPrice,
                'quantity' => $itemQuantity,
            ]);

        }

        $time = explode(':', $request->timepicker);

        if($time[0] > 12) {
            $timeValue = "PM";
            $timeString = $request->timepicker . $timeValue;
                
        }else{
            $timeValue = "AM";
            $timeString = $request->timepicker . $timeValue;
        }

        $orderHistory = OrderHistory::create([
            'orderid' => $randomNumber,
            'status' => 'Paid',
            'total' => $totalPrice + 1.30,
            'timeselect' => $timeString,
        ]);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                "amount" => ($totalPrice + 1.30) * 100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
            ]);

        Session::flash('success', 'Paid successfully!');

        $getOrder = OrderHistory::all()->where('orderid', $randomNumber);
        $getItem = OrderItems::all()->where('orderid', $randomNumber);

        return view('menus.receipt')->with('orders', $getOrder)
        ->with('items', $getItem)
        ->with('total', $totalPrice + 1.30)
        ->with('subTotal', $totalPrice)
        ->with('orderNo', $randomNumber);
    }

    public function paymentLater(){
        $request = request();

        $totalPrice = 0;

        $numberGenerator = random_int(1, 1000000);
        $randomNumber = $numberGenerator;

        $order = OrderHistory::get();

        foreach($order as $orders) {
            if ($numberGenerator == $orders->orderid) {
                do {
                    $numberGenerator = random_int(1, 1000000);
                } while ($numberGenerator != $orders->orderid);

                $randomNumber = $numberGenerator;
            } else {
                $randomNumber = $numberGenerator;
            }
        }

        $itemArray = explode(',', $request->itemArray);

        foreach($itemArray as $item) {
            $data = explode('/', $item);

            $itemName = $data[0];
            if(empty($data[1])) {
                $itemDesc = '';
            }else {
                $itemDesc = $data[1];
            }
            $itemPrice = $data[2];
            $itemQuantity = $data[3];

            $totalPrice += $itemPrice * $itemQuantity;
            
            $orderItem = OrderItems::create([
                'orderid' => $randomNumber,
                'name' => $itemName,
                'description' => $itemDesc,
                'price' => $itemPrice,
                'quantity' => $itemQuantity,
                'timeselect' => $request->timepicker,
            ]);

        }

        $time = explode(':', $request->timepicker);

        if($time[0] > 12) {
            $timeValue = "PM";
            $timeString = $request->timepicker . $timeValue;
                
        }else{
            $timeValue = "AM";
            $timeString = $request->timepicker . $timeValue;
        }

        $orderHistory = OrderHistory::create([
            'orderid' => $randomNumber,
            'status' => 'Unpaid',
            'total' => $totalPrice + 1.30,
            'timeselect' => $timeString,
        ]);

        Session::flash('success', 'Please go to counter paid your orders!');

        $getOrder = OrderHistory::all()->where('orderid', $randomNumber);
        $getItem = OrderItems::all()->where('orderid', $randomNumber);

        return view('menus.receipt')->with('orders', $getOrder)
        ->with('items', $getItem)
        ->with('total', $totalPrice + 1.30)
        ->with('subTotal', $totalPrice)
        ->with('orderNo', $randomNumber);
    }

    public function showOrder()
    {
        $orders = DB::table('my_orders')

            ->select('my_orders.id', 'my_orders.amount', 'my_orders.created_at')
            ->where('my_orders.userID', '=', Auth::id())
            ->get();

        return view('myOrder')->with('orders', $orders);
    }

    public function showAllOrder()
    {
        $orders = DB::table('my_orders')

            ->select('my_orders.id', 'my_orders.amount', 'my_orders.created_at')
            ->paginate(6);
        return view('myOrder')->with('orders', $orders);
    }

    public function storeReview(Request $request){

        $review = Review::create([
            'rating' => $request->rating,
            'description' => $request->description,
        ]);


        return redirect()->route('indexBeforeLogin');
    }
}
