<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class customerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {  
        $this->customerRepository = $customerRepository;    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('dashboard.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->customerRepository->create($request->all());

        return redirect()->route('dashboard.customers.index')->with('success', 'Berhasil menambah data pelanggan.');
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
        $customer = $this->customerDetail($id);

        return view('dashboard.customer.edit', compact('customer'));
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
        $customer = $this->customerDetail($id);
        $this->customerRepository->update($customer->id, $request->all());

        return redirect()->route('dashboard.customers.index')->with('success', 'Berhasil mengubah data pelanggan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->customerDetail($id);
        $customer->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data pelanggan.');
    }

    /**
     * Product detail
     *
     * @param integer $id
     * @return void
     */
    private function customerDetail($id)
    {
        $customer = $this->customerRepository->find($id);
        abort_if(!$customer, 404);

        return $customer;
    } 
}
