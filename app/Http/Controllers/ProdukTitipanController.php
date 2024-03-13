<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use App\Imports\ProdukImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('ok');
      $produk = ProdukTitipan::latest()->get();
      return view('produk.index', compact('produk'));
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
    public function store(StoreProdukTitipanRequest $request)
    {
        //error handing
        try {
            $validated = $request->validated();
            DB::beginTransaction();
            DB::table('produk_titipans')->insert($validated);
            

            DB::commit(); //nyimpan data ke database
            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('produk')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, ProdukTitipan $produk)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $produk->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $produk)
    {
        try {
            $produk->delete();
            return redirect('produk')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new ProdukExport, $date . 'produk.xlsx');
    }
    public function generatepdf()
    {
        $produk = ProdukTitipan::all();
        $pdf = Pdf::loadView('produk.data', compact('produk'));
        return $pdf->download('produk.pdf');
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new ProdukImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Menu Berhasil!');
        }

}
