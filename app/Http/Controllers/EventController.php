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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();

        
        // $eventpemilik = Event::leftjoin('tiket', 'event.id', '=', 'tiket.id_event')
        //                     ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
        //                     ->select('event.*', 'tiket.id_kategoritiket AS id_kategoritiket', 'tiket.qty AS stok_tiket', 'kategorievent.nama AS id_kategorievent')
        //                     ->sum('tiket.qty')
        //                     ->groupBy(\DB::raw('event.*, tiket.id_kategoritiket AS id_kategoritiket, tiket.qty AS stok_tiket, kategorievent.nama AS id_kategorievent'))
        //                     // ->groupBy(\DB::raw('event.*', 'tiket.id_kategoritiket AS id_kategoritiket', 'tiket.qty AS stok_tiket', 'kategorievent.nama AS id_kategorievent'))
        //                     ->orderBy('id', 'desc')
        //                     ->where('id_pemilik', $pemilik->id)->get();
        $eventpemilik = DB::table('event')
                        ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')
                        ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                        ->select(DB::raw('event.*, SUM(tiket.qty) as stok_tiket, kategorievent.nama as id_kategorievent'))
                        ->groupBy('id')
                        ->orderBy('id', 'desc')
                        ->where('id_pemilik', $pemilik->id)->get();
        $tiketPemilikTerjual = Transaksi::leftJoin('detail_transaksi', 'detail_transaksi.id_transaksi', '=', 'transaksi.id')
                                        ->join('users', 'transaksi.id_user', '=', 'users.id')
                                        ->join('pemilik', 'pemilik.id_user', '=', 'users.id')
                                        // ->join('event', 'event.id_pemilik', '=', 'pemilik.id')
                                        ->where('status_pembayaran', 'completed')
                                        ->where('pemilik.id', $pemilik->id)
                                        ->get()->count();
        // $tiketpemilik = DB::table('transaksi')
        //                     ->join('users', 'transaksi.id_user', '=', 'users.id')
        //                     ->join('pemilik', 'pemilik.id_user', '=', 'users.id')
        //                     ->join('event', 'event.id_pemilik', '=', 'pemilik.id')
        //                     ->join('tiket', 'tiket.id_event', '=', 'tiket.id')
        //                     ->select(DB::raw('transaksi.*'))
        //                     ->groupBy('transaksi.id_user')
        //                     ->where('status_pembayaran', 'completed')
        //                     ->where('id_pemilik', $pemilik->id)
        //                     ->get()->count();
        // dd($tiketPemilikTerjual);
        // $tiketEOterjual = Transaksi::where('status', 'terkonfirmasi')->get()->count();
        // $tiketevent = Tiket::where('id', $eventpemilik->id);
        $kategorievents = KategoriEvent::all();
        return view('user.dashboard.event', compact('kategorievents', 'eventpemilik'));
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
        
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        

        $validator = Validator::make($request->all(), [
            'nama_event' => 'required|string|max:255',
            'id_kategorievent' => 'required',
            'poster_event' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
            'foto_venue' =>  'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
            'dokumen' =>  'required|file|mimes:pdf,doc,docx|max:10000',
            'nama_tempat' => 'required|string|max:255',
            'alamat_event' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_event' => 'required|string|max:255',
            'npwp' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
            'deskripsi' => 'required|string|max:255',
            'syarat_ketentuan' =>  'required|string|max:255',
        ]);

        if($validator->passes()){
            if($request->hasFile('poster_event'))
            {
                $poster = $request->file('poster_event');
                $new_poster = Str::random(40) . '.' . $poster->getClientOriginalExtension();
                $poster->move(public_path("event/poster_event"), $new_poster);
            }

            if($request->hasFile('foto_venue'))
            {
                $venue = $request->file('foto_venue');
                $new_venue = Str::random(40) . '.' . $venue->getClientOriginalExtension();
                $venue->move(public_path("event/foto_venue"), $new_venue);
            }

            if($request->hasFile('dokumen'))
            {
                $dokumen = $request->file('dokumen');
                $new_dokumen = Str::random(40) . '.' . $dokumen->getClientOriginalExtension();
                $dokumen->move(public_path("event/dokumen_event"), $new_dokumen);
            }
            if($request->hasFile('npwp'))
            {
                $npwp = $request->file('npwp');
                $new_npwp = Str::random(40) . '.' . $npwp->getClientOriginalExtension();
                $npwp->move(public_path("event/npwp"), $new_dokumen);
            }

            
            $event = Event::create([
                'nama_event' =>  $request->nama_event,
                'id_kategorievent' =>  $request->id_kategorievent,
                'poster_event' =>  $new_poster,
                'foto_venue' =>  $new_venue,
                'dokumen' =>  $new_dokumen,
                'nama_tempat' =>  $request->nama_tempat,
                'alamat_event' =>  $request->alamat_event,
                'tanggal_mulai' =>  $request->tanggal_mulai,
                'tanggal_selesai' =>  $request->tanggal_selesai,
                'jenis_event' =>  $request->jenis_event,
                'npwp' =>  $new_npwp,
                'deskripsi' =>  $request->deskripsi,
                'syarat_ketentuan' =>  $request->syarat_ketentuan,
                'status' =>  "Menunggu",
                'id_pemilik' => $pemilik->id
                
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // dd($pemilik);
        $eventpemilik = Event::where('id', $id)->first();
        // $eventpemilik = DB::table('event')->where('id',$id)->get();
        // dd($eventpemilik);
        
        $kategorievents = KategoriEvent::all();

        return view('user.dashboard.editevent', compact('kategorievents', 'eventpemilik'));
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
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'id_kategorievent' => 'required',
            'poster_event' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
            'foto_venue' =>  'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
            'dokumen' =>  'required|file|mimes:pdf,doc,docx|max:10000',
            'nama_tempat' => 'required|string|max:255',
            'alamat_event' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis_event' => 'required|string|max:255',
            'npwp' => 'required|file|mimes:pdf,doc,docx|max:10000',
            'deskripsi' => 'required|string|max:255',
            'syarat_ketentuan' =>  'required|string|max:255',
        ],
        [
            'nama_event.required' => 'Nama Tidak Boleh Kosong',
            'id_kategorievent.required' => 'Kategori Event Tidak Boleh Kosong',
            'poster_event.required' => 'Poster Event Harus Diisi Ulang',
            'foto_venue.required' => 'Foto Venue Harus Diisi Ulang',
            'dokumen.required' => 'Dokumen Harus Diisi Ulang',
            'nama_tempat.required' => 'Nama Tempat Tidak Boleh Kosong',
            'alamat_event.required' => 'Alamat Tidak Boleh Kosong',
            'jenis_event.required' => 'Jenis Event Tidak Boleh Kosong',
            'npwp.required' => 'NPWP Harus Diisi Ulang',
            'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
            'syarat_ketentuan.required' => 'Sayarat Tidak Boleh Kosong',
            ]);

            // if($request->has('poster_event')) {
            //     $poster_event = $request->file('poster_event');
            //     $filename = $poster_event->getClientOriginalName();
            //     $poster_event->move(public_path('event/poster_event'), $filename);
            //     $eventpemilik->poster_event = $request->file('poster_event')->getClientOriginalName();
            // }
            // if($request->has('foto_venue')) {
            //     $foto_venue = $request->file('foto_venue');
            //     $filename = $foto_venue->getClientOriginalName();
            //     $foto_venue->move(public_path('event/foto_venue'), $filename);
            //     $eventpemilik->foto_venue = $request->file('foto_venue')->getClientOriginalName();
            // }
            // if($request->has('dokumen')) {
            //     $dokumen = $request->file('dokumen');
            //     $filename = $dokumen->getClientOriginalName();
            //     $dokumen->move(public_path('event/dokumen_event'), $filename);
            //     $eventpemilik->dokumen = $request->file('dokumen')->getClientOriginalName();
            // }
            // if($request->has('npwp')) {
            //     $npwp = $request->file('npwp');
            //     $filename = $npwp->getClientOriginalName();
            //     $npwp->move(public_path('event/poster_event'), $filename);
            //     $eventpemilik->npwp = $request->file('npwp')->getClientOriginalName();
            // }

            // dd($poster_event);
            if($request->hasFile('poster_event'))
            {
                $poster = $request->file('poster_event');
                $new_poster = Str::random(40) . '.' . $poster->getClientOriginalExtension();
                $poster->move(public_path("event/poster_event"), $new_poster);
            }

            if($request->hasFile('foto_venue'))
            {
                $venue = $request->file('foto_venue');
                $new_venue = Str::random(40) . '.' . $venue->getClientOriginalExtension();
                $venue->move(public_path("event/foto_venue"), $new_venue);
            }

            if($request->hasFile('dokumen'))
            {
                $dokumen = $request->file('dokumen');
                $new_dokumen = Str::random(40) . '.' . $dokumen->getClientOriginalExtension();
                $dokumen->move(public_path("event/dokumen_event"), $new_dokumen);
            }
            if($request->hasFile('npwp'))
            {
                $npwp = $request->file('npwp');
                $new_npwp = Str::random(40) . '.' . $npwp->getClientOriginalExtension();
                $npwp->move(public_path("event/npwp"), $new_dokumen);
            }
            // dd($request->all());
            
            
            Event::where('id', $id)
                ->update([
                    'nama_event' =>  $request->nama_event,
                    'id_kategorievent' =>  $request->id_kategorievent,
                    'poster_event' =>  $new_poster,
                    'foto_venue' =>  $new_venue,
                    'dokumen' =>  $new_dokumen,
                    'nama_tempat' =>  $request->nama_tempat,
                    'alamat_event' =>  $request->alamat_event,
                    'tanggal_mulai' =>  $request->tanggal_mulai,
                    'tanggal_selesai' =>  $request->tanggal_selesai,
                    'jenis_event' =>  $request->jenis_event,
                    'npwp' =>  $new_npwp,
                    'deskripsi' =>  $request->deskripsi,
                    'syarat_ketentuan' =>  $request->syarat_ketentuan,
                    'status' =>  "Menunggu",
                    'id_pemilik' => $pemilik->id
                    ]);
        return redirect('/show-event');
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
        $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // Tiket::destroy('id_event', $id);
        Event::destroy('id', $id);
        return redirect('/show-event');
    }
}
