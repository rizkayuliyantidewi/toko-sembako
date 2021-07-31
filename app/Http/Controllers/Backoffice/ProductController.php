<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    private $productCategoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository
    )
    {
        $this->productRepository = $productRepository;    
        $this->productCategoryRepository = $productCategoryRepository;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = $this->productCategoryRepository->get();

        return view('dashboard.product.create', compact('productCategories'));
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
            $this->productRepository->createNewProduct($request->all());

            return redirect()->route('dashboard.products.index')->with('success', 'Berhasil menambah data produk');
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
        $product = $this->productDetail($id);
        $productCategories = $this->productCategoryRepository->get();

        return view('dashboard.product.edit', compact('product', 'productCategories'));
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
        try {
            $product = $this->productDetail($id);
            $this->productRepository->updateProduct($product, $request->all());

            return redirect()->route('dashboard.products.index')->with('success', 'Berhasil merubah data produk');
        } catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productDetail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus produk.');
    }

    /**
     * Product detail
     *
     * @param integer $id
     * @return void
     */
    private function productDetail($id)
    {
        $product = $this->productRepository->find($id);
        abort_if(!$product, 404);

        return $product;
    } 
}
