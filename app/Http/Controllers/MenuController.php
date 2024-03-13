<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Imports\MenuImport;
use App\Models\Jenis;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           //dd('ok');
      $menu = Menu::latest()->get();
      $jeni = Jenis::pluck('nama_jenis', 'id');
      return view('menu.index', compact('menu', 'jeni'));
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
    public function store(StoreMenuRequest $request)
    {
         //error handing
         try {
            $validated = $request->validated();
            DB::beginTransaction();
            // DB::table('menus')->insert($validated);
            $menu = Menu::create($request->all());

            // Mendapatkan file yang diunggah oleh pengguna
            $file = $request->file('image');

            // Menyimpan file gambar ke direktori penyimpanan 'menu' dengan nama yang unik
            $file_name = $file->getClientOriginalName(); // Nama file asli
            $file_path = $file->storeAs('sapir', $file_name); // Simpan file dengan nama unik di direktori 'menu'

            // Simpan nama file ke dalam kolom image di database
            $menu->image = $file_path;
            $menu->save();
            DB::commit(); //nyimpan data ke database

            //untuk me-refresh ke halaman itu kembali untuk melihat hasil input
            return redirect('menu')->with('success', "input data berhasil");
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack(); //undo perubahan query/table
            dd($error->getMessage());
            // dd($this->failResponse($error->getMessage()), $error->getCode());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            DB::beginTransaction();
            $validate = $request->validated();
            $menu->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('menu')->with('success', 'Data berhasil dihapus!');
        }catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
       
    }

    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new MenuExport, $date . 'menu.xlsx');
    }
    public function generatepdf()
    {
        $menu = Menu::all();
        $pdf = Pdf::loadView('menu.data', compact('menu'));
        return $pdf->download('menu.pdf');
    }

    public function importData(Request $request){
        // dd($request->import);
        Excel::import(new MenuImport, $request->import);
    
        return redirect()->back()->with('success', 'Import Data Menu Berhasil!');
        }
}
