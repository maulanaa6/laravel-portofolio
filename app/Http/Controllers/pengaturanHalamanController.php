<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\metadata;
use Illuminate\Http\Request;

class pengaturanHalamanController extends Controller
{
    function index()
    {
        $dataHalaman = Halaman::orderBy('judul', 'asc')->get();
        return view("dashboard.pengaturanHalaman.index")->with('dataHalaman', $dataHalaman);
    }
    function update(Request $request)
    {
        metadata::updateOrCreate(['meta_key' => '_Halaman_about'], ['meta_value' => $request->_Halaman_about]);
        // metadata::updateOrCreate(['meta_key' => '_Halaman_interest'], ['meta_value' => $request->_Halaman_interest]);
        metadata::updateOrCreate(['meta_key' => '_Halaman_award'], ['meta_value' => $request->_Halaman_award]);

        return redirect()->route('pengaturanHalaman.index')->with('success', 'Berhasil update data pengaturan Halaman');
    }
}