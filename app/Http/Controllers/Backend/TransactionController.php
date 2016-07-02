<?php

namespace App\Http\Controllers\Backend;

use App\Settings;
use App\Transaction;
use App\Transactiontype;
use App\Customer;
use DB;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Backend\Access\Transaction\EditTransactionRequest;
use App\Http\Requests\Backend\Access\Transaction\StoreTransactionRequest;
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
    public function isActive($id){
        if (Customer::find($id)->where('status', '=', 1)->get()){
            return true;
        } else{
            return false;
        }
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
    public function store(StoreTransactionRequest $request)
    {
        $deposit = Transaction::create(['amount' => abs($request->amount),
            'reference' => $request->reference,
            'created_at' => $request->created_at,
            'transactiontype_id' => $request->transactiontype_id,
            'customer_id'       =>  $request->customer_id,
            'user_id' => $request->user_id
        ]);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.created'));
    }

    // withdrawl Method
    public function withdrawl(StoreTransactionRequest $request)
        
    {
        $balance = DB::table('transactions')->where('customer_id', '=', $request->customer_id)->sum('amount');
        $amountrequest = abs($request->amount);
        $settings = Settings::first();
        // Test if customer have enouth fund to make the withdrawl
        if($balance - $settings->mini_bal > $amountrequest) {
            $withdrawl = Transaction::create(['amount' => abs($request->amount) * -1,
                'reference' => $request->reference,
                'created_at' => $request->created_at,
                'transactiontype_id' => $request->transactiontype_id,
                'customer_id' => $request->customer_id,
                'user_id' => $request->user_id
            ]);
            return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.created'));
        } else
        {
            return redirect()->back()->withFlashDanger(trans('alerts.backend.transactions.failed'));
        }

    }

    // Transfert Method
    public function transfert(StoreTransactionRequest $request)
    {
        $balance = DB::table('transactions')->where('customer_id', '=', $request->customer_id)->sum('amount');
        $amountrequest = abs($request->amount);
        $settings = Settings::first();
        //$data = $request->all();
        //dd($data);
        // Test if customer have enouth fund to make the withdrawl
        if($balance - $settings->mini_bal > $amountrequest) {
            $withdrawl = Transaction::create(['amount' => abs($request->amount) * -1,
                'reference' => $request->reference,
                'created_at' => $request->created_at,
                'transactiontype_id' => 4, // $request->transactiontype_id,
                'customer_id' => $request->customer_id,
                'user_id' => $request->user_id
            ]);

            $deposit = Transaction::create(['amount' => abs($request->amount),
                'reference' => $request->reference,
                'created_at' => $request->created_at,
                'transactiontype_id' => 4,
                'customer_id'       =>  $request->number,
                'user_id' => $request->user_id
            ]);
            return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.created'));
        } else
        {
            return redirect()->back()->withFlashDanger(trans('alerts.backend.transactions.failed'));
        }

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
    public function destroy($id, DeleteTransactionRequest $request)
    {
        $this->transactions->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.deleted'));
    }

    public function delete($id, PermanentlyDeleteTransactionRequest $request)
    {
        $this->customers->delete($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.deleted_permanently'));
    }

    public function restore($id, RestoreTransactionRequest $request)
    {
        $this->customers->restore($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.restored'));
    }

    /**
     * @param  $id
     * @param  $status
     * @param  MarkCustomerRequest $request
     * @return mixed
     */
    public function mark($id, $status, MarkTransactionRequest $request)
    {
        $this->transactions->mark($id, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.transactions.updated'));
    }

    public function deactivated()
    {
        return view('backend.deactivated')
            ->withCustomers($this->transaction->getUsersPaginated(25, 0));
    }
}
