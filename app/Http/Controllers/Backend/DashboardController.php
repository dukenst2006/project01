<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Settings;
use App\Http\Requests;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Customer;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings = Settings::first();
        $totalAmount = Transaction::all()->sum('amount');
        $totalCustomer = Customer::all()->count();
        $totalDeposit = Transaction::where('transactiontype_id',1)->sum('amount');
        $totalWithdrawl = abs(Transaction::where('transactiontype_id',2)->sum('amount'));
        $totalTransfert = Transaction::where('transactiontype_id',4)->sum('amount');
        $totalCustomerdisable = Customer::where('status', 0)->count();
        $totalDeposiToday = Transaction::where('created_at', Carbon::today())->where('transactiontype_id',1 )->sum('amount');
        $totalWithdrawlToday = abs(Transaction::where('created_at', Carbon::today())->where('transactiontype_id',2 )->sum('amount'));
        //$settings = DB::table('settings')->first();
        //dd($settings->us_rate);
        return view('backend.dashboard', compact('settings', 'totalAmount', 'totalCustomer', 'totalDeposit','totalWithdrawl', 'totalTransfert',
            'totalCustomerdisable', 'totalDeposiToday', 'totalWithdrawlToday'));
    }
}