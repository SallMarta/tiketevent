<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Tiket;
use App\Pemilik;
use App\Transaksi;
use App\KategoriEvent;
use App\KategoriTiket;
use App\DetailTransaksi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahEventTerkonfirmasi = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                                        ->where('status', 'terkonfirmasi')->get()->count();

        $jumlahTiketTerjual = DetailTransaksi::join('transaksi', 'detail_transaksi.id_transaksi', '=', 'transaksi.id')
                                        ->where('status_pembayaran', 'completed')
                                        ->get()->count();
        // dd($jumlahTiketTerjual);
        

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

        // $jumlahTiketTerjual = DB::table('transaksi')
        //                 ->leftJoin('tiket', 'transaksi.id_tiket', '=', 'tiket.id')
        //                 ->select(DB::raw('COUNT(transaksi.id_tiket) AS tiket_terjual'))
        //                 ->groupBy('id_tiket')
        //                 ->get();
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

        // dd($categories);

        return view('admin.dashboard.index', compact('jumlahEventTerkonfirmasi', 'categories', 'dataevent', 'jumlahTiketTerjual'));
    }


    public function eventterbaru()
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();

        $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->join('pemilik', 'event.id_pemilik', '=', 'pemilik.id')
                            ->join('users', 'pemilik.id_user', '=', 'users.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent', 'users.name AS nama_pemilik')
                            ->where('status', 'menunggu')
                            ->orderBy('event.id', 'desc')
                            ->get();
        // dd($events);
        $kategorievents = KategoriEvent::all();

        // $events = User::join('pemilik', 'users.id', '=', 'pemilik.id_user')
        //                 ->join('event', 'event.id_pemilik', '=', 'pemilik.id_kategori')
        //                 ->join('indoregion_regencies', 'laporan.regency_id', '=', 'indoregion_regencies.id')
        //                 ->join('indoregion_districts', 'laporan.district_id', '=', 'indoregion_districts.id')
        //                 ->join('indoregion_villages', 'laporan.village_id', '=', 'indoregion_villages.id')
        //                 ->select('laporan.*', 'users.name', 'kategori.nama_kategori', 'indoregion_regencies.name AS regency_name', 'indoregion_districts.name AS district_name', 'indoregion_villages.name AS village_name')
        //                 ->orderBy('id_lapor', 'desc')
        //                 ->paginate(10);
                        // dd($events);
        return view('admin.dashboard.terbaru', compact('events', 'kategorievents'));
    }


    public function eventterkonfirmasi()
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();

        $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->join('pemilik', 'event.id_pemilik', '=', 'pemilik.id')
                            ->join('users', 'pemilik.id_user', '=', 'users.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent', 'users.name AS nama_pemilik')
                            ->where('status', 'terkonfirmasi')
                            ->orderBy('event.id', 'desc')
                            ->get();
        // dd($events);
        $kategorievents = KategoriEvent::all();

        // $events = User::join('pemilik', 'users.id', '=', 'pemilik.id_user')
        //                 ->join('event', 'event.id_pemilik', '=', 'pemilik.id_kategori')
        //                 ->join('indoregion_regencies', 'laporan.regency_id', '=', 'indoregion_regencies.id')
        //                 ->join('indoregion_districts', 'laporan.district_id', '=', 'indoregion_districts.id')
        //                 ->join('indoregion_villages', 'laporan.village_id', '=', 'indoregion_villages.id')
        //                 ->select('laporan.*', 'users.name', 'kategori.nama_kategori', 'indoregion_regencies.name AS regency_name', 'indoregion_districts.name AS district_name', 'indoregion_villages.name AS village_name')
        //                 ->orderBy('id_lapor', 'desc')
        //                 ->paginate(10);
                        // dd($events);
        return view('admin.dashboard.terkonfirmasi', compact('events', 'kategorievents'));
    }


    public function eventditolak()
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();

        $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->join('pemilik', 'event.id_pemilik', '=', 'pemilik.id')
                            ->join('users', 'pemilik.id_user', '=', 'users.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent', 'users.name AS nama_pemilik')
                            ->where('status', 'ditolak')
                            ->orderBy('event.id', 'desc')
                            ->get();
        // dd($events);
        $kategorievents = KategoriEvent::all();

        // $events = User::join('pemilik', 'users.id', '=', 'pemilik.id_user')
        //                 ->join('event', 'event.id_pemilik', '=', 'pemilik.id_kategori')
        //                 ->join('indoregion_regencies', 'laporan.regency_id', '=', 'indoregion_regencies.id')
        //                 ->join('indoregion_districts', 'laporan.district_id', '=', 'indoregion_districts.id')
        //                 ->join('indoregion_villages', 'laporan.village_id', '=', 'indoregion_villages.id')
        //                 ->select('laporan.*', 'users.name', 'kategori.nama_kategori', 'indoregion_regencies.name AS regency_name', 'indoregion_districts.name AS district_name', 'indoregion_villages.name AS village_name')
        //                 ->orderBy('id_lapor', 'desc')
        //                 ->paginate(10);
                        // dd($events);
        return view('admin.dashboard.ditolak', compact('events', 'kategorievents'));
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
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // dd($pemilik);
        $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->join('pemilik', 'event.id_pemilik', '=', 'pemilik.id')
                            ->join('users', 'pemilik.id_user', '=', 'users.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent', 'users.name AS nama_pemilik')
                            ->where('event.id', $id)->first();
        // dd($events);
        $detail = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                            ->select('tiket.*', 'kategoritiket.nama AS id_kategoritiket')
                            ->where('id_event', $events->id)
                            ->get();
        // dd($detail);
        // $kategoritikets = KategoriTiket::all();
        return view('admin.dashboard.admindetailevent', compact('events', 'detail', 'pemilik'));
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
    public function updatekonfirmasi(Request $request, $id)
    {
        Event::where('id', $id)
            ->update([
                "status" => 'Terkonfirmasi',
                ]);
        return redirect()->back();
    }
    public function updatetolak(Request $request, $id)
    {
        Event::where('id', $id)
            ->update([
                "status" => 'Ditolak',
                ]);
        return redirect()->back();
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
