<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'IdBarang';
    public $timestamps = false;
    protected $fillable = [
        'NamaBarang',
        'Keterangan',
        'Satuan',
        'Jumlah',
        'HargaPerBarang',
        'IdPengguna',
    ];
    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'IdPengguna');
    }
    public function penjualan()
    {
        return $this->hasMany(PenjualanModel::class, 'IdBarang');
    }
    public function pembelian()
    {
        return $this->hasMany(PembelianModel::class, 'IdBarang');
    }
}
