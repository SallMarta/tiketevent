<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Event;
use App\Tiket;
use App\Pemilik;
use App\KategoriEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
         if(Auth::user()){
            if(Auth::user()->role == 'user'){
                return redirect('/home');
            }else if(Auth::user()->role == 'admin'){
                return redirect('/dashboard');
            }
            return abort(404);
        } else{
            $kategorievents = KategoriEvent::all();
            $eventmusik = DB::table('event')
                    ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')            
                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                    ->select(DB::raw('event.*, MIN(tiket.harga) AS harga_min, MAX(tiket.harga) AS harga_max, kategorievent.nama AS nama_kategorievent'))
                    ->where('status', 'terkonfirmasi')
                    ->where('kategorievent.nama', 'musik')
                    
                    // ->where([
                    //         ['status', '=', 'Terkonfirmasi'],
                    //         ['nama_kategorievent', '=', 'MUSIK'],
                    //     ])
                    ->groupBy('event.id')
                    ->orderBy('event.id', 'desc')
                    ->limit(4)
                    ->get();

            $eventseni = DB::table('event')
                    ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')            
                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                    ->select(DB::raw('event.*, MIN(tiket.harga) AS harga_min, MAX(tiket.harga) AS harga_max, kategorievent.nama AS nama_kategorievent'))
                    ->where('status', 'terkonfirmasi')
                    ->where('kategorievent.nama', 'seni')
                    ->groupBy('event.id')
                    ->orderBy('event.id', 'desc')
                    ->limit(4)
                    ->get();

            $eventfestival = DB::table('event')
                    ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')            
                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                    ->select(DB::raw('event.*, MIN(tiket.harga) AS harga_min, MAX(tiket.harga) AS harga_max, kategorievent.nama AS nama_kategorievent'))
                    ->where('status', 'terkonfirmasi')
                    ->where('kategorievent.nama', 'festival')
                    ->groupBy('event.id')
                    ->orderBy('event.id', 'desc')
                    ->limit(4)
                    ->get();
                    
                    // ->where([
                    //         ['status', '=', 'Terkonfirmasi'],
                    //         ['nama_kategorievent', '=', 'MUSIK'],
                    //     ])
            // dd($eventmusik);
            return view('landingpage.welcome', compact('kategorievents', 'eventmusik', 'eventseni', 'eventfestival'));
        }
        return abort(404);
    }

    public function detailFestival($id)
    {
        if(Auth::user()){
             return redirect('/home');
        }
        $detailfestival = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent')
                            ->where('event.id', $id)->first();
        // dd($events);
        $tikets = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                            ->select('tiket.*', 'kategoritiket.nama AS nama_kategoritiket')
                            ->where('id_event', $detailfestival->id)
                            ->get();
        return view('landingpage.eventfestival-landing', compact('detailfestival', 'tikets'));
    }
    public function detailMusik($id)
    {
        $detailmusik = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent')
                            ->where('event.id', $id)->first();
        // dd($events);
        $tikets = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                            ->select('tiket.*', 'kategoritiket.nama AS nama_kategoritiket')
                            ->where('id_event', $detailmusik->id)
                            ->get();
        return view('landingpage.eventmusik-landing', compact('detailmusik', 'tikets'));
    }
    public function detailSeni($id)
    {
        $detailseni = Event::join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                            ->select('event.*', 'kategorievent.nama AS nama_kategorievent')
                            ->where('event.id', $id)->first();
        // dd($events);
        $tikets = Tiket::join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                            ->select('tiket.*', 'kategoritiket.nama AS nama_kategoritiket')
                            ->where('id_event', $detailseni->id)
                            ->get();
        return view('landingpage.eventseni-landing', compact('detailseni', 'tikets'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getRegister()
    {
        if(Auth::user()){
            return redirect('/home');
        } return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],
        [   
            'name.required'    => 'Nama Tidak Boleh Kosong!',
            'name.min'    => 'Nama minimal 3 karakter',
            'email.required'    => 'Email Tidak Boleh Kosong!',
            'email.email'    => 'Format Email tidak sesuai!',
            'email.unique'    => 'Email sudah digunakan!',
            'password.confirmed'    => ' Password harus sama!',
            'password.min'    => 'Password minimal 6 karakter!',
        ]
        );
            $user = new User;
            $user->name = $request->name;
            $user->role = 'user';
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(60);
            $user->save();
            
            return redirect('/login');
    }

    public function getLogin()
    {
        if(Auth::user()){
            return redirect('/home');
        } return view('auth.login');
    }

    public function login(Request $request)
    {
        
        // dd($request)->all();
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/home');
        } else{
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        // $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
        // $eventpemilik = Event::where('id_pemilik', $pemilik->id);
        // $kategoritikets = KategoriTiket::all();
        // $tiketevent = Tiket::leftjoin('event', 'tiket.id_event', '=', 'event.id')
        //                     ->join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
        //                     ->select('tiket.*', 'event.*', 'kategoritiket.nama AS id_kategoritiket')
        //                     ->where('id_pemilik', $pemilik->id)->get();
        // // dd($tiketevent);
        // return view('user.dashboard.detailevent', compact('kategoritikets', 'eventpemilik', 'tiketevent'));
        $id = Auth::user()->id;
        if($id == $id){
            $user = User::all()->find($id);
            $pemilik = Pemilik::where('id_user', Auth::user()->id)->first();
            
            // dd($users);
            return view('user.home.profileuser', compact('user', 'pemilik'));
        }
        return abort(404);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('user.home.editprofile');
    }

    public function myticket()
    {
        $transactions = \DB::table('transaksi')
                        ->leftJoin('detail_transaksi', 'transaksi.id', '=', 'detail_transaksi.id_transaksi')
                        ->join('tiket', 'tiket.id', '=', 'detail_transaksi.id_tiket')
                        ->join('event', 'event.id', '=', 'tiket.id_event')
                        ->leftJoin('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                        ->selectRaw('transaksi.*, detail_transaksi.*, event.*, tiket.harga AS harga_tiket, tiket.tanggal_tiket, tiket.waktu_mulai, tiket.waktu_selesai, tiket.id_event, kategoritiket.nama AS nama_tiket')
                        ->orderBy('transaksi.id', 'desc')
                        ->orderBy('detail_transaksi.id', 'desc')
                        ->where('transaksi.id_user', Auth::user()->id)
                        ->get();
        // dd($transactions);

        return view('user.home.myticket', compact('transactions'));
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
        $this->validate($request, [
            'name' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'foto_profil' => 'required|image|mimes:jpeg,JPEG,PNG,JPG,png,jpg,gif|max:10000',
        ],
        [   
            'name.required'    => 'Nama Tidak Boleh Kosong!',
            'foto_profil.image' => 'File Harus Berupa Gambar',
            'foto_profil.mimes' => 'Foto Profil Tidak Sesuai',
        ]
        );

        $users = User::where('id', $user->id)
        ->update([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto_profil' => $request->foto_profil,

        ]);
        return redirect('/myprofile/'.$user->id);
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
