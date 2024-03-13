<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeTransaksiRequest $request)
    {
        try {

            DB::beginTransaction(); //memulai transaksi

            //mengambil Id terakhir dari transaksi yang memiliki tanggal hari ini.
            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();
            // dd($last_id);
            // Menentukan nomor transaksi baru berdasarkan ID transaksi terakhir. 
            $noTrans = $last_id == null ? date('Ymd').'0001' : date('Ymd').sprintf('%04d', substr($last_id->id, 8, 4) + 1);
            
//Membuat iterasi (menjalankan perulangan) untuk setiap elemen yg ada dalam array 'orederedList'.
            $insertTransaksi = Transaksi::create([
                'id' => $noTrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);

            // Ini adalah kondisi if yang mengecek apakah properti exists dari instance $insertTransaksi adalah false. 
            //Jika nilai exists adalah false, 
            //artinya proses penciptaan record transaksi tidak berhasil, 
            //dan kode di dalam blok if akan dieksekusi.
            if(!$insertTransaksi->exists) return 'error';

// Setiap elemen mewakili detail dari suatu transaksi,
// Setiap detail transksi dimasukkan ke dalam tabel 'DetailTransaksi'
            foreach ($request->orderedList as $detail){
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id' => $noTrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty'],
                ]);
            }

            DB::commit(); // Menyimpan Data ke Database
            //return $insertTransaksi;
            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'noTrans'=> $noTrans]);
                        }catch (Exception| QueryException | PDOException $e){
                            // dd($e);
                            return response()->json(['status' =>false, 'message' => 'Pemesanan gagal']);
                            DB::rollBack(); //undo perubahan query atau table
                        };
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

// function untuk mengambil data transaksi dari database berdasarkan nomor faktur
// Ini adalah deklarasi fungsi dgn nama faktur yg menerima paramtere $nofaktur
// fungsinya untuk menampilkan faktur berdasarkan nomor faktur tertentu.
    public function faktur($nofaktur){
        try{
        $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['DetailTransaksi' => function
        ($query){
            $query->with('menu');
        }])->first(); // digunakan untuk mengambil 1 transaksi dri database berdasarkan nofaktur tertentu.
        //yg diatas ini untuk mencari record transaksi dari tabel 'Transaksi' yg memiliki kolom
        //id sama dengan nomor faktur yang diberikan. 
        // 'with' dan query with itu untuk memulai relasi, yakni detailTransaksi berelasi dengan menu.

        // dd($data->detailTransaksi);
        // foreach ($data->DetailTransaksi as $dt){
        //     echo $dt->menu->nama_menu."<br>";
        // dd($data);
        return view('cetak.faktur')->with($data); //untuk menghasilkan output bersama dengan $data ke dalm view
    } catch (Exception | QueryException | PDOException $e) {
        // dd($e);
        return response()->json(['status'=>false, 'message'=>'pemesanan gagal']);
    }
}
}

