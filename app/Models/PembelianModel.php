<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianModel extends Model
{
    use HasFactory;

    protected $table = 'pembelian';
    protected $primaryKey = 'IdPembelian';
    public $timestamps = false;
    protected $fillable = [
        'JumlahPembelian',
        'HargaBeli',
        'IdBarang',
        'IdPengguna',
        'IdSupplier',
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'IdBarang');
    }
    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'IdPengguna');
    }
    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class, 'IdSupplier');
    }
}
