<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 'IdSupplier';
    public $timestamps = false;
    protected $fillable = [
        'NamaSupplier',
        'Alamat',
        'NoHp',
    ];
    public function pembelian()
    {
        return $this->hasMany(PembelianModel::class, 'IdSupplier');
    }
}
