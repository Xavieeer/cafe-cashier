<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tanggal', 'total_harga', 'metode_pembayaran', 'keterangan'];

    public function DetailTransaksi(){
        return $this->hasMany(DetailTransaksi::class);
    }
}

// class DetailTransaksi extends Model
// {
//     use HasFactory;

//     protected $table = 'detail_transaksis';
//     protected $fillable = ['transaksi_id', 'menu_id', 'jumlah', 'subtotal'];

//     public function Transaksi(){
//         return $this->belongsTo(Transaksi::class, 'transaksi_id');
//     }

//     public function menu(){
//         return $this->hasOne(Menu::class, 'id', 'menu_id');
//     }
// }

// class Menu extends Model
// {
//     use HasFactory;
//     protected $table = 'menus';
//     protected $fillable = ['nama_menu'];

//     public function Jenis()
//     {
//         return $this->belongsTo(Jenis::class, 'jenis_id');
//     }
// }
