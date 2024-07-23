<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'IdPenjualan';
    public $timestamps = false;
    protected $fillable = [
        'JumlahPembelian',
        'HargaJual',
        'IdBarang',
        'IdPengguna',
        'IdPelanggan',
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'IdBarang');
    }
    public function pengguna()
    {
        return $this->belongsTo(PenggunaModel::class, 'IdPengguna');
    }
    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'IdPelanggan');
    }
}
