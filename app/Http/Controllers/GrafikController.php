<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
   public function index(Request $request)
   {


      $today = Carbon::now();
      //tampilan untuk jumlah menu
      $data['count_menu'] = Menu::count();

      //tampilkan 10 pelanggan
      $data['pelanggan'] = Pelanggan::limit(10)->orderBy('created_at', 'desc')->get();


      // Tambahkan script untuk menghitung jumlah menu yang sering dipesan
      $menuTerlaris = DetailTransaksi::select('menu_id', DB::raw('SUM(jumlah) as total_jumlah'))
         ->groupBy('menu_id')
         ->orderBy('total_jumlah')
         ->limit(5) // Ambil 5 menu terlaris
         ->get();

      $data['menuTerlaris'] = $menuTerlaris;

      // tampilkan pendapatan
      $data['pendapatan'] = Transaksi::sum('total_harga');

      // tampilkan jumlah transaksi
      $jumlahTransaksiHariIni = Transaksi::whereDate('created_at', $today)->count();
      $data['jumlahTransaksiHariIni'] = $jumlahTransaksiHariIni;

      //Menampilkan sisa stok yang tersedia
      $sisaStokTerkecil = Stok::orderBy('jumlah')->get();

        $data['sisaStokTerkecil'] = $sisaStokTerkecil;

      return view('dashboard.data')->with($data);
   }
}
