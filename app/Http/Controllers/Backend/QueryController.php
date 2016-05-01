<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class QueryController extends Controller
{
    public function search(Request $request)
    {
        // Gets the query string from our form submission
        $query = Request::input('search');
        $customerSearch = DB::table('customers')->where('number', 'LIKE', '%' . $query . '%');
        dd($customerSearch);
        // returns a view and passes the view the customer and the original query.
        return view('backend.search', compact('customerSearch', 'query'));
    }
    public function store(Request $request)
    {
        // Gets the query string from our form submission
        $query = Request::input('search');
        $customerSearch = DB::table('customers')->where('number', 'LIKE', '%' . $query . '%');
        dd($customerSearch);
        // returns a view and passes the view the customer and the original query.
        return view('backend.search', compact('customerSearch', 'query'));
    }
    public function update(Request $request, $id)
    {
        //
    }

}
