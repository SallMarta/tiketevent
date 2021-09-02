<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pemilik;
use App\Tiket;
use App\Event;
use App\KategoriTiket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // $eventpemilik = Event::where('id_pemilik', $pemilik->id)->get();
        // $tiketevent = Tiket::leftjoin('event', 'tiket.id_event', '=', 'event.id')
        //                     ->join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
        //                     ->select('tiket.*', 'event.*', 'kategoritiket.nama AS id_kategoritiket')
        //                     ->where('id_pemilik', $pemilik->id)->get();
        // // dd($tiketevent);
        // $kategoritikets = KategoriTiket::all();
        // return view('user.dashboard.detailevent', compact('kategoritikets', 'eventpemilik', 'tiketevent'));
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
    
    public function store(Request $request, $id)
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();

        $eventpemilik = Event::where('id', $id)->first();
        // dd($eventpemilik);
        // $tiketevent = Event::where('id_event', $event->id);
        

        $kategoritikets = KategoriTiket::all();

        $validator = Validator::make($request->all(), [
            'harga' => 'required|numeric',
            'id_kategoritiket' => 'required',
            'qty' =>  'required|numeric',
            'tanggal_tiket' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after_or_equal:waktu_mulai',
            'deskripsi' => 'required|string|max:255',
        ]);

        if($validator->passes()){

            $tiketevent = Tiket::create([
                'harga' =>  $request->harga,
                'id_kategoritiket' =>  $request->id_kategoritiket,
                'qty' =>  $request->qty,
                'tanggal_tiket' =>  $request->tanggal_tiket,
                'waktu_mulai' =>  $request->waktu_mulai,
                'waktu_selesai' =>  $request->waktu_selesai,
                'deskripsi' =>  $request->deskripsi,
                'id_event' => $eventpemilik->id,
                ]);
        return redirect()->back();
    } else {
        return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // dd($pemilik);
        $eventpemilik = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->join('pemilik', 'event.id_pemilik', '=', 'pemilik.id')
                            ->join('users', 'pemilik.id_user', '=', 'users.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent', 'users.name AS nama_pemilik')
                            ->where('event.id', $id)->first();
        // dd($eventpemilik);
        $tiketevent = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                            ->select('tiket.*', 'kategoritiket.nama AS id_kategoritiket')
                            ->where('id_event', $eventpemilik->id)
                            ->get();
        
        
        // dd($tiketevent);
        $kategoritikets = KategoriTiket::all();
        return view('user.dashboard.detailevent', compact('kategoritikets', 'eventpemilik', 'tiketevent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // $eventpemilik = Event::where('id_pemilik', $pemilik->id)->first();
        
        $tiketevent = Tiket::where('id', $id)->first();
        // dd($tiketevent);
        // dd($tiketevent);
        
        $kategoritikets = KategoriTiket::all();
        return view('user.dashboard.edittiket', compact('tiketevent', 'kategoritikets'));
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
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        $tiket = Tiket::where('id', $id)->first();
        // dd($tiket);
        
        $eventpemilik = Event::where('id', $tiket->id_event)->first();
        // dd($eventpemilik);
        $request->validate([
            'harga' => 'required|numeric',
            'id_kategoritiket' => 'required',
            'qty' =>  'required|numeric',
            'tanggal_tiket' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after_or_equal:waktu_mulai',
            'deskripsi' => 'required|string|max:255',
        ],
        [
            'harga.required' => 'Harga Tidak Boleh Kosong',
            'id_kategoritiket.required' => 'Kategori Event Tidak Boleh Kosong',
            'qty.required' => 'Banyak tiket Harus Diisi Ulang',
            'tanggal_tiket.required' => 'tanggal selesai Harus Diisi',
            'waktu_mulai.required' => ' waktu mulai Tidak Boleh Kosong',
            'waktu_selesai.required' => 'waktu selesai Tidak Boleh Kosong',
            'deskripsi.required' => 'deskripsi Tidak Boleh Kosong',
            ]);
            // dd($request->all());
            Tiket::where('id', $id)
                ->update([
                    'harga' =>  $request->harga,
                    'id_kategoritiket' =>  $request->id_kategoritiket,
                    'qty' =>  $request->qty,
                    'tanggal_tiket' =>  $request->tanggal_tiket,
                    'waktu_mulai' =>  $request->waktu_mulai,
                    'waktu_selesai' =>  $request->waktu_selesai,
                    'deskripsi' =>  $request->deskripsi,
                    // 'id_event' => $eventpemilik->id,
                    ]);
        return redirect('/show-event/' .$eventpemilik->id .'/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        $tiket = Tiket::where('id', $id)->first();
        $eventpemilik = Event::where('id', $tiket->id_event)->first();
        Tiket::destroy('id', $id);
        return redirect('/show-event/' .$eventpemilik->id .'/detail');
    }
}
