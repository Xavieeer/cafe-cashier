<?php

namespace App\Http\Controllers;

use App\Exports\KaryawanExport;
use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Imports\KaryawanImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // dd('ok');
      $karyawan = Karyawan::latest()->get();
      return view('karyawan.index', compact('karyawan'));
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
    public function store(StoreKaryawanRequest $request)
    {
        //error handing
        try {
            $validated = $request->validated();
            DB::beginTransaction();
            DB::table('karyawans')->insert($validated);
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('karyawan')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $karyawan = Karyawan::find($id);
        // return view('karyawan.edit')->with('karyawan', $karyawan);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $karyawan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        try {
            $karyawan->delete();
            return redirect('karyawan')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        };
    }
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new KaryawanExport, $date . 'karyawan.xlsx');
    }
    public function generatepdf()
    {
        $karyawan = Karyawan::all();
        $pdf = Pdf::loadView('karyawan.data', compact('karyawan'));
        return $pdf->download('karyawan.pdf');
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new KaryawanImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Stok Berhasil!');
        }

}
