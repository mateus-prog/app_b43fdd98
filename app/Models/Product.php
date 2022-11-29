<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\Format;

class Product extends BaseModel
{
    use HasFactory;

    public $table = 'products';
	public $fillable = [
        'name', 'sku', 'count_available', 'created_at', 'updated_at'
    ];
	public $searchable = [
        'name', 'sku', 'count_available', 'created_at', 'updated_at'
    ];

    public $timestamps = true;

    public function format()
    {
        return (object) [
            "id" => $this->id,
            "name" => $this->name,
            "sku" => $this->sku,
            "count_available" => $this->count_available,
            "created_at" => Format::formatDateTime($this->created_at),
            "updated_at" => Format::formatDateTime($this->updated_at),
        ];
    }
}
