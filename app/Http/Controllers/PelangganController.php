<?php

namespace App\Http\Controllers;

use App\Exports\PelangganExport;
use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Imports\PelangganImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // dd('ok');
      $pelanggan = Pelanggan::orderBy('created_at', 'ASC')->get();
      return view('pelanggan.index', compact('pelanggan'));
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
    public function store(StorePelangganRequest $request)
    {
          //error handing
          try {
            $validated = $request->validated();
            DB::beginTransaction();
            DB::table('pelanggans')->insert($validated);
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('pelanggan')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $pelanggan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date . 'pelanggan.xlsx');
    }
    public function generatepdf()
    {
        $pelanggan = Pelanggan::all();
        $pdf = Pdf::loadView('pelanggan.pelangganPdf', compact('pelanggan'));
        return $pdf->download('pelanggan.pdf');
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new PelangganImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Pelanggan Berhasil!');
        }
}
