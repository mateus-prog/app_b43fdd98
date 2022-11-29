<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\Format;

class ProductStock extends BaseModel
{
    use HasFactory;

    public $table = 'product_stock';
	public $fillable = [
        'product_id', 'count', 'is_sum', 'created_at', 'updated_at'
    ];
	public $searchable = [
        'product_id', 'count', 'is_sum', 'created_at', 'updated_at'
    ];

    public $timestamps = true;
    public $softDelete = true;

    public function format()
    {
        return (object) [
            "id" => $this->id,
            "product_id" => $this->product_id,
            "count" => $this->count,
            "is_sum" => $this->is_sum ? 'success' : 'danger',
            "created_at" => Format::formatDateTime($this->created_at),
            "updated_at" => Format::formatDateTime($this->updated_at),
            "deleted_at" => Format::formatDateTime($this->deleted_at),
        ];
    }
}
