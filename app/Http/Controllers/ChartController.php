<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use DB;
class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::select(DB::raw("COUNT(*) as count"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months_user = User::select(DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        $users = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months_user as $index => $months_user){
            $users[$months_user - 1] = $user[$index];
        }

        // $income = Order::select(DB::raw('sum(total_price) as sums'))->whereNotBetween('status', ["On Process","Pending"])->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('sums');
        // $months_income = Order::select(DB::raw("Month(created_at) as month"))->whereYear('created_at', date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        // $incomes = array(0,0,0,0,0,0,0,0,0,0,0,0);
        // foreach($months_income as $index => $months_income){
        //     $incomes[$months_income - 1] = $income[$index];
        // }
        $income = Order::select(DB::raw('sum(total_price) as sums'), DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"))
        ->where('status','Finished')->groupBy('months', 'monthKey')
        ->orderBy('created_at', 'ASC')
        ->get();
        $incomes = [0,0,0,0,0,0,0,0,0,0,0,0];

foreach($income as $order){
    $incomes[$order->monthKey-1] = $order->sums;
}

        return view('admin.data.chart.index',compact('users','incomes'));
        // $order = Order::all()->where('status', 'Finished')->sum('total_price');
        // dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
