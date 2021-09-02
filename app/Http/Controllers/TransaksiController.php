<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use App\Tiket;
use App\Transaksi;
use App\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $event = Event::find($id);

        $sub_total_order = 0;
        $data_request = $request->all();

        foreach ($data_request as $key => $value) {
        $price = \DB::table('tiket')
                    ->leftJoin('event', 'tiket.id_event', '=', 'event.id')
                    ->select('tiket.*', 'event.status')
                    ->where('tiket.id', $value['id'])->first();

        if( $price->qty <= 0 || (($price->qty - $value['qty']) <= 0) ){
            return response()->json(['errors' => ' Tickets are Sold Out.'], 422);
        }

        if(($price->status == "menunggu" || $price->status == "ditolak") ){
            return response()->json(['errors' => 'Invalid! ticket status are ' .$price->status. '!'], 422);
        }

        $sub_total_order += $value['qty'] * $price->harga;
        }

        $transaction = Transaksi::create([
                'email_user' => Auth::user()->email,
                'sub_total_order' => $sub_total_order,
                'waktu_order' => date("Y-m-d H:i:s"),
                'total_pembayaran' => 0,
                'status_pembayaran' => 'Pending',
                'id_user' => Auth::user()->id
        ]);

        foreach ($data_request as $key => $value) {
        $price = \DB::table('tiket')->where('id', $value['id'])->first();
        DetailTransaksi::create([
                'id_transaksi' => $transaction->id,
                'id_tiket' => $value['id'],
                'harga' => $price->harga,
                'qty' => $value['qty']
        ]);
        }

        return response()->json(['id' => $transaction->id], 200);
        // return view('user.home.myticket');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beli($id)
    {
        // dd($id);

        $transaksi = Transaksi::findOrFail($id);
        // dd($transaksi);
        if($transaksi->id_user == Auth::user()->id){
            if($transaksi->status_pembayaran == 'Pending'){
                $detailtransaksi = \DB::table('detail_transaksi')
                                    ->leftJoin('tiket', 'detail_transaksi.id_tiket', '=', 'tiket.id')
                                    ->join('event', 'tiket.id_event', '=', 'event.id')
                                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                                    ->join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                                    ->select('detail_transaksi.*', 'event.nama_event AS event', 'event.tanggal_mulai AS tanggal', 'kategoritiket.nama AS nama_tiket')
                                    ->where('id_transaksi', $transaksi->id)
                                    ->get();
                // dd($detailtransaksi);
                return view('user.home.formcheckout', compact('transaksi', 'detailtransaksi'));
            }
            else
                return abort(404);
        }
        else
            return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    public function bayar(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        if($transaksi->id_user == Auth::user()->id){
            $detailtransaksi = \DB::table('detail_transaksi')->select('*')->where('id_transaksi', $transaksi->id)->get();

            $validator = Validator::make($request->all(), [
                'total_pembayaran' => 'required|numeric|min:0|not_in:0'
            ]);

            if($validator->passes()){
               if($transaksi->sub_total_order != $request->total_pembayaran){
                    return response()->json(['errors' => 'Your cash must be same with subtotal!'], 422);
                }
                foreach ($detailtransaksi as $key => $value) {
                    $ticket = \DB::table('tiket')
                                ->leftJoin('event', 'tiket.id_event', '=', 'event.id')
                                ->select('tiket.*', 'event.status')
                                ->where('tiket.id', $value->id_tiket)->first();

                    if($ticket->status == "menunggu" || $ticket->status == "ditolak" ){
                        $transaksi->update([
                            'status_pembayaran' => 'invalid'
                        ]);
                        return response()->json(['errors' => 'Invalid! ticket purchased are '.$ticket->status. '!'], 422);
                    }

                    if($ticket->qty > 0 ) {
                        if( ($ticket->qty - $value->qty) >= 0 ) {
                            Tiket::where('id', $ticket->id)->update([
                                'qty' => $ticket->qty - $value->qty
                            ]);
                        }else{
                            $transaksi->update([
                                'status_pembayaran' => 'invalid'
                            ]);
                            return response()->json(['errors' => 'Invalid!, ticket purchased are sold!'], 422);
                        }
                    }else{
                        $transaksi->update([
                            'status_pembayaran' => 'invalid'
                        ]);
                        return response()->json(['errors' => 'Invalid!, ticket purchased are sold!'], 422);
                    }
                }
                $transaksi->update([
                    'total_pembayaran' => $request->total_pembayaran,
                    'status_pembayaran' => 'completed'
                ]);

                return response()->json(['success' => "true"], 200);
            }else
                return response()->json(['errors' => $validator->errors()->all()], 422);
        }
        else
            return abort(404);
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
