<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Event;
use Pemilik;
use App\KategoriTiket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KategoriTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoritikets = KategoriTiket::all();
        return view('admin.dashboard.kategoritiket', compact('kategoritikets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
         ],
        [
            'nama.required' => 'Nama Kategori Tidak Boleh Kosong!',
            'nama.string' => 'Nama Kategori Hanya Boleh Huruf',
            'nama.max' => 'Nama Kategori Maksimal 255 character!'
        ]);
         KategoriTiket::create([
            "nama" => $request->nama,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoritiket = KategoriTiket::where('id', $id)->first();
        // dd($kategorievent);

        $kategoritikets = KategoriTiket::all();

        return view('admin.dashboard.editkategoritiket', compact('kategoritiket', 'kategoritikets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        KategoriTiket::where('id', $id)
                    ->update([
                        'nama' => $request->nama,
                    ]);
        return redirect('/kategoritiket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriTiket::destroy('id', $id);

        return redirect()->back();
    }
}
