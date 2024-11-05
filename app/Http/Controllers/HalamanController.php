<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.Halaman.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('isi', $request->isi);

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Diisi',
                'isi.required' => 'Isian Tulisan Wajib Diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        Halaman::create($data);

        return redirect()->route('Halaman.index')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Halaman::where('id', $id)->first();
        return view('dashboard.Halaman.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ],
            [
                'judul.required' => 'Judul Wajib Diisi',
                'isi.required' => 'Isian Tulisan Wajib Diisi',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        Halaman::where('id', $id)->update($data);

        return redirect()->route('Halaman.index')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Halaman::where('id', $id)->delete();
        return redirect()->route('Halaman.index')->with('success', 'Berhasil Melakukan Delete Data');
    }
    
}
