<?php

namespace App\Http\Controllers;

//ini namanya import untuk mengakses class
use App\Exports\AbsensiExport;
use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class AbsensiController extends Controller //inheritance atau yang mewarisi semua fitur 
{
    /**
     * Display a listing of the resource.
     */
    public function index() //method
    {
        $absensi = Absensi::latest()->get();
        return view('absensi.index', compact('absensi'));
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
    public function store(StoreAbsensiRequest $request)
    {
          //error handing
          try {
            $validated = $request->validated();
            DB::beginTransaction();
            DB::table('absensis')->insert($validated);
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            
            return redirect('absensi')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $absensi->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        try {
            $absensi->delete();
            return redirect('absensi')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d'); // Mendapatkan tanggal saat ini dalam format 'Y-m-d' dan menyimpannya dalam variabel $date
        return Excel::download(new AbsensiExport, $date . 'absensi.xlsx'); //Memanggil metode download dari Laravel 
        //Excel untuk memulai proses pengunduhan file.
    }

    public function generatepdf()
    {
        $absensi = Absensi::all(); //mengambil semua data dari absensi di database
        $pdf = Pdf::loadView('absensi.data', compact('absensi')); //membuat view ke pdf
        return $pdf->download('absensi.pdf');
    }
}
