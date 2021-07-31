<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TransactionRepository;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private $transactionRepository;
    private $customerRepository;
    private $productRepository;

    public function __construct(
        TransactionRepository $transactionRepository,
        CustomerRepository $customerRepository,
        ProductRepository $productRepository
    )
    {
        $this->transactionRepository = $transactionRepository;    
        $this->customerRepository = $customerRepository;    
        $this->productRepository = $productRepository;    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transactionRepository
            ->with('items.product')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('dashboard.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customerRepository->get();
        $products = $this->productRepository->get();

        return view('dashboard.transaction.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->transactionRepository->createNewTransaction($request->all());

            return redirect()->route('dashboard.transactions.index')->with('success', 'Berhasil menambah data transaksi.');
        } catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
    public function edit($id)
    {
        $transaction = $this->transactionDetail($id);
        $customers = $this->customerRepository->get();
        $products = $this->productRepository->get();

        return view('dashboard.transaction.edit', compact('transaction', 'customers', 'products'));
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
        $transaction = $this->transactionDetail($id);
        $this->transactionRepository->updateTransaction($transaction, $request->all());

        return redirect()->route('dashboard.transactions.index')->with('success', 'Berhasil mengubah data transaksi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionDetail($id);
        $transaction->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data transaksi.');
    }

    /**
     * Transaction detail
     *
     * @param integer $id
     * @return void
     */
    private function transactionDetail($id)
    {
        $transaction = $this->transactionRepository->with('items')->find($id);
        abort_if(!$transaction, 404);
        
        return $transaction;
    } 
}
