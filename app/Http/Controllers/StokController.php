<?php

namespace App\Http\Controllers;

use App\Exports\StokExport;
use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Imports\StokImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // dd('ok');
      $stok = Stok::latest()->get();
      return view('stok.index', compact('stok'));
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
    public function store(StoreStokRequest $request)
    {
        //error handing
        try {
            $validated = $request->validated();
            DB::beginTransaction();
            DB::table('stoks')->insert($validated);
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('stok')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $stok->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();
            return redirect('stok')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new StokExport, $date . 'stok.xlsx');
    }
    public function generatepdf()
    {
        $stok = Stok::all();
        $pdf = Pdf::loadView('stok.data', compact('stok'));
        return $pdf->download('stok.pdf');
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new StokImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Stok Berhasil!');
        }
}
