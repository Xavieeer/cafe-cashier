<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Imports\MejaImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // dd('ok');
          //instance atau objek
      $meja = Meja::latest()->get(); 
      //mengambil data baru dari tabel meja dalam database, fungsi ini jalan ketika kita mencet menu meja
      return view('meja.index', compact('meja'));
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
    public function store(StoreMejaRequest $request)
    {
         //error handing
         try {
            $validated = $request->validated();
            DB::beginTransaction();
            DB::table('mejas')->insert($validated);
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('meja')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $meja->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        try {
            $meja->delete();
            return redirect('meja')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
       
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MejaExport, $date . 'meja.xlsx');
    }
    public function generatepdf()
    {
        $meja = Meja::all();
        $pdf = Pdf::loadView('meja.data', compact('meja'));
        return $pdf->download('meja.pdf');
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new MejaImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Meja Berhasil!');
        }
}
