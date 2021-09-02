<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Pemilik;
use App\Transaksi;
use App\KategoriEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($pemilik = Pemilik::where('id_user', Auth::user()->id)->first()){
            $jumlahEventTerkonfirmasi = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                                        ->where('status', 'terkonfirmasi')->get()->count();
            $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->select('kategorievent.nama AS nama_kategorievent')
                            ->distinct()
                            ->get();
        
            // $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
            // dd($pemilik);
            $jumlahEventPerKategori = DB::table('event')
                            ->select(DB::raw('COUNT(id_kategorievent) AS jumlah_kategori'))
                            ->groupBy('id_kategorievent')
                            // ->orderBy('id', 'desc')
                            ->get();

            $jumlahTiketTerjual = DB::table('transaksi')
                            ->leftjoin('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'transaksi.id')
                            ->join('tiket', 'detail_transaksi.id_tiket', '=', 'tiket.id')
                            ->select(DB::raw('transaksi.*, detail_transaksi.*, tiket.*'))
                            // ->groupBy('transaksi.id')
                            ->where('transaksi.id_user')
                            ->get();
            // dd($jumlahTiketTerjual);

            // dd($jumlahEventPerKategori);
            $categories = [];
            $dataevent = [];

            foreach($events as $iven){
                $categories[] = $iven->nama_kategorievent;
            }
            foreach($jumlahEventPerKategori as $jumlahevent){
                $dataevent[] = $jumlahevent->jumlah_kategori;
            }

            return view('user.dashboard.index', compact('jumlahEventTerkonfirmasi', 'categories', 'dataevent'));
        } return view('user.dashboard.formpemilik', compact('pemilik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function pembayaran()
    {
        // $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // $transaksi = Transaksi::all();
        
        // $transaksi = Transaksi::where('id_user', Auth::user()->id)->first();
        // $detailtransaksi = DB::table('transaksi')
        //                     ->join('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'transaksi.id')
        //                     ->join('tiket', 'detail_transaksi.id_tiket', '=', 'tiket.id')
        //                     ->select('transaksi.*', 'detail_transaksi.*', 'tiket.*')
        //                     ->where('transaksi.id')
        //                     ->get();
        // dd($detailtransaksi);
        return view('user.home.pembayaran', compact('detailtransaksi'));
        // }
        
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
