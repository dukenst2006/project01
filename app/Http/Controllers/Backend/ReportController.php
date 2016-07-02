<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Settings;
use App\Http\Requests;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Customer;

class ReportController extends Controller
{
    public function bymonth(){
        $settings = Settings::find(1)->first();
//        dd($settings); $orders_this_month = Order::where( DB::raw('MONTH(created_at)'), '=', date('n') )->get();
        $reportMonthDepots = Transaction::where(DB::raw('MONTH(created_at)'), '=', date(5))->where('transactiontype_id',1 )->get();
        return view('backend.report_by_month', compact('settings', 'reportMonthDepots'));
    }

    public function specificDate( $date){
        $result = Transaction::whereRaw('date(created_at) = ?', [Carbon::today()]);
    }
}
