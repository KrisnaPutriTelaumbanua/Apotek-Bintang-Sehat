<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Transaction;
use App\Models\Product;

class ItemTransaction extends Model
{
    use HasFactory, SoftDeletes;

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
