<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'nama_barang',
        'jumlah_barang',
        'harga_barang',
        'deskripsi_barang',
        'code_barang',
        'image',
    ];

    protected $hidden = [
 'code_barang',
    ];

    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'code_barang';
    }   

}
