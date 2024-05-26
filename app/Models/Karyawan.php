<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'karyawan';

    protected $fillable = [
        'name',
        'email',
        'posisi',
        'tanggal_masuk',
    ];

    // Jika ada atribut tambahan yang perlu dihitung atau diakses secara dinamis, gunakan accessor atau mutator
    // protected $appends = ['age'];

    // public function getAgeAttribute()
    // {
    //     return Carbon::parse($this->dob)->age;
    // }

    public function shift()
    {
        return $this->hasMany(Shift::class, 'id_karyawan', 'id');
    }
}
