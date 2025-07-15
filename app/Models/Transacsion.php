<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transacsion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'nama_barang',
        'jumlah',
        'harga_satuan',
        'total_harga',
        'status',
        'nomor_pemesanan',
    ];

    public function getRouteKeyName()
    {
        return 'nomor_pemesanan';
    }
}
