<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Event;
use App\Pemilik;
use App\KategoriEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nohp' => 'required|string|max:15',
            'pekerjaan' => 'required|string|max:255',
            'alamat_pemilik' => 'required|string|max:255',
            'kartu_identitas' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
        ]);

        if($validator->passes()){
            if($request->hasFile('kartu_identitas'))
            {
                $kartu = $request->file('kartu_identitas');
                $new_kartu = Str::random(40) . '.' . $kartu->getClientOriginalExtension();
                $kartu->move(public_path("kartu_identitas"), $new_kartu);
            }
            $pemilik = Pemilik::create([
                'id_user' => auth()->user()->id,
                'nohp' => $request->nohp,
                'pekerjaan' => $request->pekerjaan,
                'alamat_pemilik' =>  $request->alamat_pemilik,
                'kartu_identitas' => $new_kartu,
                ]);
        return redirect('/dashboardEO');
    } else {
        return redirect()->back();
        }



        // $new_foto = '';

        // if($request->hasFile('kartu_identitas')){
        //     $kartu_identitas = $request->file('kartu_identitas');
        //     $new_foto = $kartu_identitas->getClientOriginalName();
        //     // dd($foto);
        //     $kartu_identitas->move(public_path("/kartu_identitas"), $new_foto);
        //     $request->merge(['kartu_identitas' => $new_foto]);
        // }

        // $request->validate([
        //     'nohp' => 'required',
        //     'pekerjaan' => 'required',
        //     'alamat_pemilik' => 'required',
        //     'kartu_identitas' => 'required',
        //  ],
        // [
        //     'noktp.required' => 'No. KTP Tidak Boleh Kosong',
        //     'nohp.required' => 'No. HP Tidak Boleh Kosong',
        //     'pekerjaan.required' => 'Pekerjaan Tidak Boleh Kosong',
        //     'alamat_pemilik.required' => 'Alamat Tidak Boleh Kosong',
        //     'kartu_identitas.required' => 'Kartu Identitas Tidak Boleh Kosong',
        // ]);
        // Pemilik::create([
        //     "id_user" => auth()->user()->id,
        //     "nohp" => $request->nohp,
        //     "pekerjaan" => $request->pekerjaan,
        //     "alamat_pemilik" =>  $request->alamat_pemilik,
        //     "kartu_identitas" => $new_foto,
        // ]);
        // return redirect('/dashboardEO');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
