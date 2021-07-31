<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $productRepository;
    
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function home()
    {
        $products = $this->productRepository
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->paginate();
            
        return view('landing.index', compact('products'));
    }

    public function productDetail($id)
    {
        $product = $this->productRepository->find($id);
        abort_if(!$product, 404);

        $similars = $this->productRepository->similarProducts($product);
        
        return view('landing.show', compact('product', 'similars'));
    }
}
