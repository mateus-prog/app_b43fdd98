<?php

namespace App\Http\Controllers;

use App\Http\HttpStatus;
use App\Http\Requests\ProductStockPostRequest;
use App\Services\Product\ProductStockService;
use Exception;
use App\Traits\ApiResponser;
use App\Traits\Pagination;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductStockController extends Controller
{
    use ApiResponser;
    use Pagination;

    protected $productStockService;

    public function __construct(
        ProductStockService $productStockService, 
    )
    {
        $this->productStockService = $productStockService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockProduct = $this->productStockService->all();

        return $this->success($stockProduct, HttpStatus::SUCCESS);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductStockPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStockPostRequest $request)
    {
        try {  
            $input = $request->all();
            $stockProduct = $this->productStockService->store($input);
            
            return $this->success($stockProduct, HttpStatus::CREATED);
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
            $stockProduct = $this->productStockService->findById($id);

            return $this->success($stockProduct, HttpStatus::SUCCESS);
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductStockPostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStockPostRequest $request, $id)
    {
        try {
            $input = $request->all();
            $this->productStockService->update($id, $input);

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
            $this->productStockService->destroy($id);

            return response()->noContent();
        } catch (Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
