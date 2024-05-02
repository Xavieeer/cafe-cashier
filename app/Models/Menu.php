<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = ['nama_menu', 'harga', 'image','deskripsi','jenis_id'];

    public function Jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id', 'menu_id');
    }
}
