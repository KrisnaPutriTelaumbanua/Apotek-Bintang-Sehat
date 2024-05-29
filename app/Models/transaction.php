<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemTransaction;

class transactions extends Model
{
    use HasFactory;

    public static function getLastCode($prefix)
    {
        $lastNumber = transactions::query()
            ->where('code','like',$prefix,'%')
            ->withTrashed()
            ->get()->count();
        return $prefix.str_pad(($lastNumber + 1), 4, '0', STR_PAD_LEFT);
    }

    public function itemTransactions()    {
        return $this->hasMany(ItemTransaction::class);  }
}
