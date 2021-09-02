<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Event;
use Pemilik;
use App\KategoriEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KategoriEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorievents = KategoriEvent::all();
        return view('admin.dashboard.kategorievent', compact('kategorievents'));
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
         KategoriEvent::create([
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategorievent = KategoriEvent::where('id', $id)->first();
        // dd($kategorievent);

        $kategorievents = KategoriEvent::all();

        return view('admin.dashboard.editkategorievent', compact('kategorievent', 'kategorievents'));
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
        KategoriEvent::where('id', $id)
                    ->update([
                        'nama' => $request->nama,
                    ]);
        return redirect('/kategorievent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        KategoriEvent::destroy('id', $id);

        return redirect()->back();
    }
}
