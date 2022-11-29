<?php

namespace App\Services\Product;

use App\Repositories\Elouquent\ProductStockRepository;
use App\Repositories\Elouquent\ProductRepository;
use Exception;

class ProductStockService
{
    public function __construct()
    {
        $this->productStockRepository = new ProductStockRepository();
        $this->productRepository = new ProductRepository();
    }

    /**
     * Selecione todos os usuarios
     * @return array
    */
    public function all()
    {
        $productsStock = $this->productStockRepository->all();

        foreach($productsStock as $productStock)
        {
            $product = $this->productRepository->findById($productStock->product_id);
            $productStock->name = $product->name;
        }

        return $productsStock;
    }

    public function store(array $request)
    {
        try { 
            return $this->productStockRepository->store($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function findById(int $id)
    {
        return $this->productStockRepository->findById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->findById($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $request)
    {
        try {
            return $this->productStockRepository->update($id, $request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
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
        $this->productStockRepository->delete($id);
    }

}
