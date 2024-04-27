<?php

namespace App\Http\Controllers;

use App\Exports\JenisExport;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Imports\JenisImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // dd('ok');
      $jeni = Jenis::latest()->get();
      return view('jenis.index', compact('jeni'));
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
    public function store(StoreJenisRequest $request)
    {
         //error handling
         try {
            $validated = $request->validated(); // berisi data yang telah lulus validasi dan lakukan operasi selanjutnya
            DB::beginTransaction(); // memulai transaksi
            DB::table('jenis')->insert($validated); // menyisipkan data ke dalam tabel 'jenis'
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('jenis')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage()); // debugging, sama seperti console.log
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jeni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $jenis = Jenis::find($id);
        // return view('jenis.edit')->with('jenis', $jenis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jeni)
    {
        try {
            DB::beginTransaction(); // memulai transaksi 
            $validate = $request->validated(); //berisi data yg lulus dan operasi dilanjutkan
            $jeni->update($validate); //memanggil metode update dalam model jeni dgn data yg udh divalidasi
            DB::commit(); // untuk menyimpan data jika tidak error
            return redirect()->back()->with('success', 'data berhasil di ubah'); //merefresh kembali jika berhasil
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
            //ika ada kesalahan, pengguna akan diarahkan kembali ke halaman sebelumnya 
            //dengan pesan kesalahan yang dapat ditangkap di frontend dan ditampilkan kepada pengguna.
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        try {
            $jeni->delete(); //Memanggil metode delete() pada model $jeni
            return redirect('jenis')->with('success', 'Data berhasil dihapus!'); //merefresh ke halaman jika berhasil
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
            //ika terjadi kesalahan, kontrol diarahkan ke metode failResponse
        }
    }
    public function exportData()
    {
        $date = date('Y-m-d'); // Mendapatkan tanggal saat ini dalam format 'Y-m-d' dan menyimpannya dalam variabel $date
        return Excel::download(new JenisExport, $date . 'jenis.xlsx'); //Memanggil metode download dari Laravel 
        //Excel untuk memulai proses pengunduhan file.
    }
    public function generatepdf()
    {
        $jeni = Jenis::all(); //Mengambil semua data dari model 'Jenis' dan menyimpannya dalam variabel $jeni
        $pdf = PDF::loadView('jenis.jenisPdf', compact('jeni')); //untuk memuat tampilan dgn menggunakan data yg disediakan melalui compact
        return $pdf->download('jenis.pdf'); 
        //Menggunakan metode download dari objek PDF 
        //untuk menghasilkan respons berupa file PDF yang akan diunduh oleh pengguna
        // fungsi compact digunakan untuk membuat array dengan kunci 'jeni' dan nilai dari variabel $jeni
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new JenisImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Jenis Berhasil!');
        }
    }

