<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {  
        $this->productCategoryRepository = $productCategoryRepository;    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = $this->productCategoryRepository
            ->with('products')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('dashboard.product.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productCategoryRepository->create($request->all());

        return redirect()->route('dashboard.categories.index')->with('success', 'Berhasil menambah kategori produk.');
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
        $productCategory = $this->productCategoryDetail($id);

        return view('dashboard.product.category.edit', compact('productCategory'));
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
        $productCategory = $this->productCategoryDetail($id);
        $this->productCategoryRepository->update($productCategory->id, $request->all());

        return redirect()->route('dashboard.categories.index')->with('success', 'Berhasil mengubah kategori produk.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory = $this->productCategoryDetail($id);
        $productCategory->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus kategori produk.');
    }

    /**
     * Product detail
     *
     * @param integer $id
     * @return void
     */
    private function productCategoryDetail($id)
    {
        $productCategory = $this->productCategoryRepository->find($id);
        abort_if(!$productCategory, 404);

        return $productCategory;
    } 
}
