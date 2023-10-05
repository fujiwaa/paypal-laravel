<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $guarded = ['id_transaksi'];

    public function User() {
        return $this->hasOne(UserModel::class, 'id_user', 'id_user');
    }

    public function Barang() {
        return $this->hasOne(BarangModel::class, 'id_barang', 'id_barang');
    }
}
