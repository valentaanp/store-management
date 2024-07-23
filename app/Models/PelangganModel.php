<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $primaryKey = 'IdPelanggan';
    public $timestamps = false;
    protected $fillable = [
        'NamaPelanggan',
        'Alamat',
        'NoHp',
    ];
    public function penjualan()
    {
        return $this->hasMany(PenjualanModel::class, 'IdPelanggan');
    }

}
