<?php

namespace App\Http\Controllers\Backend;

use App\Customer;
use App\Transaction;
use App\Http\Controllers\Controller;
use Searchy;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Backend\Access\Customer\EditCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\MarkCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\StoreCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\CreateCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\UpdateCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\DeleteCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\RestoreCustomerRequest;
use App\Http\Requests\Backend\Access\Customer\PermanentlyDeleteCustomerRequest;
use App\Repositories\Backend\Access\Customer\CustomerRepositoryContract;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customers;

    public function __construct(
        CustomerRepositoryContract $customers
    )
    {
        $this->customers      = $customers;
    }

    public function index()
    {
        return view('backend.index')
            ->withCustomers($this->customers->getCustomersPaginated(config('access.users.default_per_page'), 1));
        //$customers = Customer::all();
        //return view('backend.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCustomerRequest $request)
    {
        //Generate Account number
        $accountNumber = 'AAA-'. rand();
        return view('backend.create', compact('accountNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //$customer = new Customer;
//        $customer = Customer::firstOrNew(array(
//            $number = $request->input['number'],
//            $name       = $request->input['name'],
//            $lastname   = $request->input['lastname'],
//            $address    = $request->input['address'],
//            $city       = $request->input['city'],
//            $email      = $request->input['email'],
//            $occupation = $request->input['occupation'],
//            $users_id   = $request->input['users_id']
//        ));

        $customers = new Customer;
        $customers->name = $request->name;
        $customers = Customer::create(['name' => $request->name,
            'number' => $request->number,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'user_id' => $request->user_id
                                    ]);
        return redirect()->route('admin.customer.index')->withFlashSuccess(trans('alerts.backend.users.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$customer = DB::table('customers')->find($id); //Customer::find($id)->get();
        $customer = Customer::find($id);
        //$transactions = DB::table('transactions')->where('customer_id', '=', $id)->get();
        $transactions = Transaction::where('customer_id', '=', $id)->limit(10)->get();
        //$balance = DB::table('transactions')->where('customer_id', '=', $id)->sum('amount');
        $balance = Transaction::where('customer_id', '=',$id)->sum('amount');
        $TransactionRef = 'REF-'. rand();
        //dd($TransactionRef);
        return view('backend.profile', compact('customer','transactions', 'balance', 'TransactionRef'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, EditCustomerRequest $request)
    {
       // $customer = $this->customers->findOrThrowException($id, true);
        $customer = Customer::find($id);
        if(is_null($customer)){
            return view(backend.index);
        }
        return view('backend.edit')
            ->withCustomer($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateCustomerRequest $request)
    {
        //$this->customers->update($id);
        $customer = Customer::find($id);
        $customer->fill(Input::all());
        $customer->save();
        return redirect()->route('admin.customer.index')->withFlashSuccess(trans('alerts.backend.users.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteCustomerRequest $request)
    {
        $this->customers->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted'));
    }

    public function delete($id, PermanentlyDeleteCustomerRequest $request)
    {
        $this->customers->delete($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted_permanently'));
    }

    public function restore($id, RestoreCustomerRequest $request)
    {
        $this->customers->restore($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.restored'));
    }

    /**
     * @param  $id
     * @param  $status
     * @param  MarkCustomerRequest $request
     * @return mixed
     */
    public function mark($id, $status, MarkCustomerRequest $request)
    {
        $this->customers->mark($id, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.updated'));
    }

    public function deactivated()
    {
        return view('backend.deactivated')
            ->withCustomers($this->customers->getUsersPaginated(25, 0));
    }

    public function search()
    {
        // Gets the query string from our form submission
        //$query = $request->input('search');
        $query = Input::get('q');
        $customerSearch = Searchy::customers('number', 'name', 'lastname')->query($query)->get();
        // returns a view and passes the view the customer and the original query.
        return view('backend.search', compact('customerSearch', 'query'));
    }
    
}
