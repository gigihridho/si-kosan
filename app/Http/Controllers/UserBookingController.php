<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\RoomBooking;
use App\Booking;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    protected function setPdfOption()
    {
        return [
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ];
    }
    public function index(){
        $transaction = Booking::where('user_id','=',Auth::user()->id)->get();
        return view('pages.user.user-transaksi.index',[
            'transaction' => $transaction
        ]);
    }

    public function lanjut(Request $request){
        $transaction = Booking::with('user','kamar')
            ->where('user_id',Auth::user()->id)
            ->latest()
            ->first();
        if ($transaction->payment == 0) {
            return redirect()->back()->withErrors('Menunggu admin melakukan konfirmasi pembayaran sebelumnya');
        }
        $tipe_kamar =  $transaction->kamar->tipe_kamar;

        return view('pages.user.user-transaksi.create',[
            'transaction' => $transaction,
            'tipe_kamar' => $tipe_kamar
        ]);
    }

    public function save(Request $request){
        $old_room_booking = json_decode($request->transaction);
        $new_tanggal_masuk = $old_room_booking->tanggal_keluar;
        $durasi = $request->input('durasi');
        $total_harga = $request->input('total');
        $kode = 'KOS'.date("ymd").mt_rand(0000,9999);

        if ($durasi == 1) {
            $new_tanggal_keluar = date('Y-m-d', strtotime('+1 month', strtotime($new_tanggal_masuk)));
        } elseif ($durasi == 6){
            $new_tanggal_keluar = date('Y-m-d', strtotime('+6 month', strtotime($new_tanggal_masuk)));
        } else {
            $new_tanggal_keluar = date('Y-m-d', strtotime('+12 month', strtotime($new_tanggal_masuk)));
        }

        $user = Auth::user();
        $transaction = new Booking();
        $transaction->durasi = $durasi;
        $transaction->tanggal_masuk = $new_tanggal_masuk;
        $transaction->tanggal_keluar = $new_tanggal_keluar;
        $transaction->tanggal_pesan = Carbon::now();
        $transaction->total_harga = $total_harga;
        $transaction->kamar_id = $old_room_booking->kamar_id;
        $transaction->user_id = $user->id;
        $transaction->kode = $kode;
        if($request->hasFile('bukti_pembayaran')){
            $path = $request->file('bukti_pembayaran')->store('assets/transaction','public');
            $transaction->bukti_pembayaran = $path;
        }
        $transaction->save();

        Alert::success('SUCCESS','Berhasil melakukan perpanjangan sewa kamar');
        return redirect()->route('user-transaksi');
    }
    public function invoice($id){
        $now = Carbon::now();
        $transaction = Booking::with('user','kamar')->where('id', $id)->first();
        // dd($transaction);
        $pdf = PDF::loadview('pages.user.user-transaksi.invoice_pdf',[
            'now' => $now,
            'transaction' => $transaction,
        ]);
        return $pdf->download('invoice.pdf');
    }
    public function detail(Request $request, $id){
        $transaction = Booking::where('id',$id)->get();

        return view('pages.user.user-transaksi.detail',[
            'transaction' => $transaction,
        ]);
    }

    public function upload(Request $request,$id){
        $this->validate($request, [
            'bukti_pembayaran' => 'required|image|max:2048|mimes:png,jpg,jpeg',
        ],
        [
            'bukti_pembayaran.required' => 'Bukti pembayaran tidak boleh kosong',
            'bukti_pembayaran.max' => 'Bukti pembayaran melebihi 2MB',
            'bukti_pembayaran.mimes' => 'Format file tidak didukung'
        ]);
        $user = Auth::user();

        $transaction = Booking::with('user','kamar')->where('user_id', Auth::user()->id)->latest()->first();
        if($request->hasFile('bukti_pembayaran')){
            $path = $request->file('bukti_pembayaran')->store('assets/transaction','public');
            $transaction->bukti_pembayaran = $path;
        }
        $transaction->save();

        Alert::success('SUCCESS','Bukti pembayaran berhasil disimpan');
        return redirect()->back();
    }
}