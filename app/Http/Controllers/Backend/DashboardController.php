<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Settings;
use App\Http\Requests;
use App\Transaction;
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
        //$settings = DB::table('settings')->first();
        //dd($settings->us_rate);
        return view('backend.dashboard', compact('settings', 'totalAmount', 'totalCustomer'));
    }
}