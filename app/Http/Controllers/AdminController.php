<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Review;
use App\Models\FoodReview;
use App\Models\OrderItems;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function viewlogin(){
        return view('admin.login');
    }

    public function vieworderhistory(){
        return view('admin.orderhistory', [
            'orderhistories' => OrderHistory::latest()->where('status', 'Completed')->orWhere('status', 'Cancelled')->paginate(15)
        ]);
    }

    public function viewpastorder($id){
        $viewOrder = OrderHistory::all()->where('orderid', $id);
        $viewOrderItems = OrderItems::all()->where('orderid', $id);

        $subTotal = 0;
        $total = 0;
        
        foreach($viewOrderItems as $item) {
            $subTotal += ($item->quantity * $item->price);
        }

        $total = $subTotal + 1.30;

        return view('admin.pastorder')->with('orderhistoryitems', $viewOrderItems)
        ->with('orderhistory', $viewOrder)->with('subtotal', $subTotal)
        ->with('total', $total);
    }

    public function getMonthlySales() {
        $dateTimeNow = explode(' ', Carbon::now()->toDateTimeString());
        $myTime = explode('-', $dateTimeNow[0]);
        $year = $myTime[0];

        $monthlySales = DB::table('order_histories')
        ->whereYear('updated_at', '=', $year)
        ->where('order_histories.status', '=', 'Completed')
        ->select([
            DB::raw('MONTH(updated_at) as month'),
            DB::raw('sum(total) as totalSale'),
        ])
        ->groupBy('month')
        ->get();

        return $monthlySales;
    }

    public function getYearSale() {
        $dateTimeNow = explode(' ', Carbon::now()->toDateTimeString());
        $myTime = explode('-', $dateTimeNow[0]);
        $year = $myTime[0];

        $yearSale = DB::table('order_histories')
        ->whereYear('updated_at', '=', $year)
        ->where('order_histories.status', '=', 'Completed')
        ->select([
            DB::raw('sum(total) as totalSale'),
        ])
        ->get();

        return $yearSale;
    }

    public function viewadminportal(){
        //Total Reviews Count
        $attr1 = Review::all();
        $attr2 = FoodReview::all();
        $reviewcounter = (count($attr1) + count($attr2));

        //Pending Orders Count
        $attr3 = OrderHistory::where('status', 'Paid')->orWhere('status', 'Unpaid')->get();
        $pendingordercounter = count($attr3);

        //Completed Orders Count
        $attr4 = OrderHistory::where('status', 'Completed')->orWhere('status', 'Cancelled')->get();
        $deliveredcounter = count($attr4);

        //Total Sales Count
        $attr5 = OrderHistory::get()->where('status', 'Completed');
        $totalsalescounter = count($attr5);


        //Total Sales Amount
        $dateTimeNow = explode(' ', Carbon::now()->toDateTimeString());
        $myTime = explode('-', $dateTimeNow[0]);
        $year = $myTime[0];
        $totalsalesamount = AdminController::getYearSale();
       
        //Monthly Chart Sale
        $data = AdminController::getMonthlySales();

        $jan = 0;
        $feb = 0;
        $march = 0;
        $apr = 0;
        $may = 0;
        $jun = 0;
        $july = 0;
        $aug = 0;
        $sept = 0;
        $oct = 0;
        $nov = 0;
        $dec = 0;

        foreach($data as $datas) {
            $month = $datas->month;

            switch ($month) {
                case 1:
                    $jan += $datas->totalSale;
                    break;
                case 2:
                    $feb += $datas->totalSale;
                    break;
                case 3:
                    $march += $datas->totalSale;
                    break;
                case 4:
                    $apr += $datas->totalSale;
                    break;
                case 5:
                    $may += $datas->totalSale;
                    break;
                case 6:
                    $jun += $datas->totalSale;
                    break;
                case 7:
                    $july += $datas->totalSale;
                    break;
                case 8:
                    $aug += $datas->totalSale;
                    break;
                case 9:
                    $sept += $datas->totalSale;
                    break;
                case 10:
                    $oct += $datas->totalSale;
                    break;
                case 11:
                    $nov += $datas->totalSale;
                    break;
                case 12:
                    $dec += $datas->totalSale;
                    break;
            }
        }

        

        return view('admin.adminportal', [
            'reviewcounter' => $reviewcounter,
            'pendingordercounter' => $pendingordercounter,
            'deliveredcounter' => $deliveredcounter,
            'totalsalescounter' => $totalsalescounter,
            'latestorders' => OrderHistory::Latest()->where('status', 'Unpaid')->orWhere('status', 'Paid')->take(5)->get(),
            'latestongoingorders' => OrderHistory::orderBy('updated_at', 'DESC')->where('status', 'Ongoing')->take(5)->get(),
            'latestservingorders' => OrderHistory::orderBy('updated_at', 'DESC')->where('status', 'Serving')->take(5)->get(),
            'latestdeliveredorders' => OrderHistory::orderBy('updated_at', 'DESC')->where('status', 'Completed')->take(5)->get(),
            'totalsalesamount' => $totalsalesamount,
            'jan' => $jan,
            'feb' => $feb,
            'march' => $march,
            'apr' => $apr,
            'may' => $may,
            'jun' => $jun,
            'july' => $july,
            'aug' => $aug,
            'sept' => $sept,
            'oct' => $oct,
            'nov' => $nov,
            'dec' => $dec,
        ]);
    }

    public function viewmanageorder(){

        return view('admin.manageorder', [
            'orderhistoriesnew' => OrderHistory::Oldest()->where('status', 'Unpaid')->orWhere('status', 'Paid')->paginate(5),
            'orderhistoriesongoing' => OrderHistory::Oldest()->where('status', 'Ongoing')->paginate(5),
            'orderhistoriesserving' => OrderHistory::Oldest()->where('status', 'Ready')->paginate(5),
        ]);
    }

    public function vieworder($id){
        $viewOrder = OrderHistory::all()->where('orderid', $id);
        $viewOrderItems = OrderItems::all()->where('orderid', $id);

        $subTotal = 0;
        $total = 0;
        
        foreach($viewOrderItems as $item) {
            $subTotal += ($item->quantity * $item->price);
        }

        $total = $subTotal + 1.30;

        return view('admin.vieworder')->with('orderhistoryitems', $viewOrderItems)
        ->with('orderhistory', $viewOrder)->with('subtotal', $subTotal)
        ->with('total', $total);
    }

    public function updateorderstatus() {
        $r = request();

        $update = OrderHistory::where('orderid', $r->orderid)
        ->update([
            'status' => $r->orderstatus,
        ]);

        if($r->orderstatus == 'Ongoing'){
            Session::flash('success', 'Order updated to started.');
        } else if ($r->orderstatus == 'Ready') {
            Session::flash('success', 'Order updated to ready.');
        } else if ($r->orderstatus == 'Completed') {
            Session::flash('success', 'Order updated to completed! Order has been moved to order history.');
        } else {
            Session::flash('success', 'Order updated to cancelled! Order has been moved to order history.');
        }
        return redirect()->route('manageorder');
    }

    public function clearorderhistory(){
        $orderhistory = OrderHistory::Oldest()->where('status', 'Cancelled')->orWhere('status', 'Completed')->delete();

        Session::flash('success', 'You have cleared order history!');

        return redirect()->route('orderhistory');
    }


    //Reviews
    public function viewallreviews(){
        //--Food Reviews--

        //Total Count
        $attr1 = FoodReview::all();
        $foodreviewcounter = count($attr1);

        //Positive Count
        $attr3 = FoodReview::where('rating', '5')->orWhere('rating', '4')->get();
        $foodreviewpositivecount = count($attr3);

        //Neutral Count
        $attr4 = FoodReview::where('rating', '3')->get();
        $foodreviewneutralcount = count($attr4);

        //Negative Count
        $attr5 = FoodReview::where('rating', '2')->orWhere('rating', '1')->get();
        $foodreviewnegativecount = count($attr5);

        //Finding Percentage Of Positive Food Review
        $foodreviewpositivepercentage = round((($foodreviewpositivecount / $foodreviewcounter) * 100));

        //Finding Percentage Of Neutral Food Review
        $foodreviewneutralpercentage = round((($foodreviewneutralcount / $foodreviewcounter) * 100));

        //Finding Percentage Of Negative Food Review
        $foodreviewnegativepercentage = round((($foodreviewnegativecount / $foodreviewcounter) * 100));


        //--Order Reviews--

        //Total Count
        $attr2 = Review::all();
        $orderreviewcounter = count($attr2);


        //Positive Count
        $attr6 = Review::where('rating', '5')->orWhere('rating', '4')->get();
        $orderreviewpositivecount = count($attr6);

        //Neutral Count
        $attr7 = Review::where('rating', '3')->get();
        $orderreviewneutralcount = count($attr7);

        //Negative Count
        $attr8 = Review::where('rating', '2')->orWhere('rating', '1')->get();
        $orderreviewnegativecount = count($attr8);

        //Finding Percentage Of Positive Order Review
        $orderreviewpositivepercentage = round((($orderreviewpositivecount / $orderreviewcounter) * 100));

        //Finding Percentage Of Neutral Order Review
        $orderreviewneutralpercentage = round((($orderreviewneutralcount / $orderreviewcounter) * 100));

        //Finding Percentage Of Negative Order Review
        $orderreviewnegativepercentage = round((($orderreviewnegativecount / $orderreviewcounter) * 100));

        return view('admin.showReviews', [
            'foodreviewcounter' => $foodreviewcounter,
            'foodreviewpositivecount' => $foodreviewpositivecount,
            'foodreviewpositivepercentage' => $foodreviewpositivepercentage,
            'foodreviewneutralpercentage' => $foodreviewneutralpercentage,
            'foodreviewnegativepercentage' => $foodreviewnegativepercentage,
            'foodreviewneutralcount' => $foodreviewneutralcount,
            'foodreviewnegativecount' => $foodreviewnegativecount,
            'orderreviewcounter' => $orderreviewcounter,
            'orderreviewpositivecount' => $orderreviewpositivecount,
            'orderreviewpositivepercentage' => $orderreviewpositivepercentage,
            'orderreviewneutralpercentage' => $orderreviewneutralpercentage,
            'orderreviewnegativepercentage' => $orderreviewnegativepercentage,
            'orderreviewneutralcount' => $orderreviewneutralcount,
            'orderreviewnegativecount' => $orderreviewnegativecount,
        ]);
    }

    public function viewallfoodreviews(){
        $foodreviews = FoodReview::all();

        return view('admin.showFoodReviews', [
            'foodreviews' => $foodreviews
        ]);
    }

    public function deletefoodreview($id) {
        $foodreview = FoodReview::find($id);

        $foodreview->delete();

        Session::flash('danger', 'Food review deleted successfully!');

        return redirect()->route('viewallfoodreviews');
    }

    public function viewallorderreviews(){
        $orderreviews = Review::all();

        return view('admin.showOrderReviews', [
            'orderreviews' => $orderreviews
        ]);
    }

    public function deleteorderreview($id) {
        $orderreview = Review::find($id);

        $orderreview->delete();

        Session::flash('danger', 'Order review deleted successfully!');

        return redirect()->route('viewallorderreviews');
    }

}
