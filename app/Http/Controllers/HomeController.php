<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Event;
use App\Tiket;
use App\Pemilik;
use App\KategoriEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventall = DB::table('event')
                    ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')            
                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                    ->select(DB::raw('event.*, MIN(tiket.harga) AS harga_min, MAX(tiket.harga) AS harga_max, kategorievent.nama AS nama_kategorievent'))
                    ->where('status', 'Terkonfirmasi')
                    ->groupBy('event.id')
                    ->orderBy('event.id', 'desc')
                    ->paginate(12);
                    // ->get(

        // $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
        //                 ->select('event.*', 'kategorievent.nama AS nama_kategorievent')
        //                 ->where('status', 'terkonfirmasi')
        //                 ->orderBy('event.id', 'desc')
        //                 ->get();
        // dd($events);
        
        $kategorievents = KategoriEvent::all();

        
        return view('user.home.index', compact('eventall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail($id)
    {
        $eventss = Event::where('id', Auth::user()->id)->first();

        $eventdetail = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent')
                            ->where('event.id', $id)->first();
        // dd($events);
        $tikets = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                            ->select('tiket.*', 'kategoritiket.nama AS nama_kategoritiket')
                            ->where('id_event', $eventdetail->id)
                            ->get();
        return view('user.home.detailevent', compact('eventdetail', 'tikets'));
    }

    public function about(){
        return view('user.home.about');
    }


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
        // $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();

        // $events = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
        //                     ->join('pemilik', 'event.id_pemilik', '=', 'pemilik.id')
        //                     ->join('users', 'pemilik.id_user', '=', 'users.id')
        //                     ->select('event.*', 'kategorievent.nama AS nama_kategorievent', 'users.name AS nama_pemilik')
        //                     ->where('event.id', $id)->first();
        // // dd($events);
        // $detail = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
        //                     ->select('tiket.*', 'kategoritiket.nama AS id_kategoritiket')
        //                     ->where('id_event', $events->id)
        //                     ->get();
        // return view('user.home.detailevent', compact('events', 'detail', 'pemilik'));
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
