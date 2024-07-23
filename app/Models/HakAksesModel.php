<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAksesModel extends Model
{
    use HasFactory;

    protected $table = 'hakakses';
    protected $primaryKey = 'IdAkses';
    public $timestamps = false;

    protected $fillable = [
        'NamaAkses',
        'Keterangan',
    ];

    public function pengguna()
    {
        return $this->hasMany(PenggunaModel::class, 'IdAkses');
    }
}
