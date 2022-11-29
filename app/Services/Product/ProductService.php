<?php

namespace App\Services\Product;

use App\Repositories\Elouquent\ProductRepository;
use Exception;

class ProductService
{
    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    /**
     * Selecione todos os usuarios
     * @return array
    */
    public function all()
    {
        return $this->productRepository->all();
    }

    public function store(array $request)
    {
        try { 
            return $this->productRepository->store($request);
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
        return $this->productRepository->findById($id);
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
            return $this->productRepository->update($id, $request);
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
        $this->productRepository->delete($id);
    }

}
