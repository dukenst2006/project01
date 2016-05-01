<?php

namespace App\Http\Controllers\Backend;

use App\Transaction;
use App\Transactiontype;
use App\Customer;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Backend\Access\Transaction\EditTransactionRequest;
use App\Http\Requests\Backend\Access\Transaction\StoreCustomerRequest;
use App\Http\Requests\Backend\Access\Transaction\CreateTransactionRequest;
use App\Http\Requests\Backend\Access\Transaction\UpdateTransactionRequest;
use App\Http\Requests\Backend\Access\Transaction\DeleteTransactionRequest;
use App\Http\Requests\Backend\Access\Customer\RestoreCustomerRequest;
use App\Http\Requests\Backend\Access\Transaction\PermanentlyDeleteTransactionRequest;
use App\Repositories\Backend\Access\Transaction\TransactionRepositoryContract;

class TransactionController extends Controller
{
   protected $transactions;
//
    public function __construct(
        TransactionRepositoryContract $transactions
    )
   {
         $this->transactions      = $transactions;
   }

    public function index()
    {
//        return view('backend.transaction.index')
//            ->withTransactions($this->transactions->getTransactionsPaginated(config('access.users.default_per_page'), 1));$transactions = Transaction::all();
        //$transactions = Customer::find(2)->transaction;
        $transactions = Transaction::all();
//        foreach ($transactions as $transaction){
//            echo $transaction->amount.Transactiontype::find($transaction->transactiontype_id)->name."par ". Customer::find($transaction->customer_id)->name."autorisé par ".User::find($transaction->user_id)->name."<br />";
//        }
        //dd($transactions);
       //die();

    //    return view('backend.transaction.index', compact('transactions'));
        return view('backend.transaction.index')
        ->withTransactions($this->transactions->getTransactionsPaginated(config('access.users.default_per_page'), 1));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateTransactionRequest $request)
    {
        return view('backend.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
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
        //
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
}
