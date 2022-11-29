<?php

namespace App\Http\Controllers;

use App\Http\HttpStatus;
use App\Http\Requests\ProductsPostRequest;
use App\Services\Product\ProductService;
use Exception;
use App\Traits\ApiResponser;
use App\Traits\Pagination;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductsController extends Controller
{
    use ApiResponser;
    use Pagination;

    protected $productService;

    public function __construct(
        ProductService $productService,
    )
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->all();

        return $this->success($products, HttpStatus::SUCCESS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductsPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsPostRequest $request)
    {
        try {  
            $input = $request->all();
            $product = $this->productService->store($input);
            
            return $this->success($product, HttpStatus::CREATED);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = $this->productService->findById($id);

            return $this->success($product, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductsPostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsPostRequest $request, $id)
    {
        try {
            $input = $request->all();
            $this->productService->update($id, $input);

            return response()->noContent();
        } catch (ModelNotFoundException $m) {
            return $this->error($m->getMessage(), HttpStatus::NOT_FOUND);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
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
        try {
            $this->productService->destroy($id);

            return response()->noContent();
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
