<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaModel extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'IdPengguna';
    public $timestamps = false;
    protected $fillable = [
        'NamaPengguna',
        'Password',
        'NamaDepan',
        'NamaBelakang',
        'NoHp',
        'Alamat',
        'IdAkses',
    ];
    protected $hidden = [
        'Password',
    ];
    public function hakAkses()
    {
        return $this->belongsTo(HakAksesModel::class, 'IdAkses');
    }
    public function barang()
    {
        return $this->hasMany(BarangModel::class, 'IdPengguna');
    }
    public function penjualan()
    {
        return $this->hasMany(PenjualanModel::class, 'IdPengguna');
    }
    public function pembelian()
    {
        return $this->hasMany(PembelianModel::class, 'IdPengguna');
    }
}
