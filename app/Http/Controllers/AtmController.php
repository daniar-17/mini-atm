<?php

namespace App\Http\Controllers;

use App\Models\Atm;
use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class AtmController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        $saldo = Saldo::where('id', 1)->first();
        return view("atm.data", compact('saldo','transaksi'));
    }

    public function tarik_tunai(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $saldo = Saldo::where('id', 1)->first();
        $jumlah = str_replace(",","",$request->jumlah_tunai);
        $saldoNew = $saldo->total - $jumlah;
        if($jumlah % 50000 != 0){
            return response()->json([
                'status' => false,
                'info' => 'Tarik Tunai Harus Kelipatan Rp. 50.000'
            ], 201);
        }elseif($jumlah > $saldo->total){
            return response()->json([
                'status' => false,
                'info' => 'Saldo Tidak Mencukupi'
            ], 201);
        }elseif($saldoNew < 0){
            return response()->json([
                'status' => false,
                'info' => 'Saldo Tidak Boleh Sampai Minus'
            ], 201);
        }else{
            DB::table('saldo')->where('id', 1)->update([
                'total' => $saldoNew
            ]);

            Transaksi::create([
                'nama' => 'Tarik Tunai',
                'jumlah' => $jumlah,
            ]);

            return response()->json([
                'status' => true,
                'info' => 'Tarik Tunai Berhasil'
            ], 201);
        }
    }

    public function topup(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $saldo = Saldo::where('id', 1)->first();
        $jumlah = str_replace(",","",$request->jumlah_topup);
        $saldoNew = $saldo->total + $jumlah;
        DB::table('saldo')->where('id', 1)->update([
                'total' => $saldoNew
            ]);

        Transaksi::create([
            'nama' => 'Top Up',
            'jumlah' => $jumlah,
        ]);

        return response()->json([
            'status' => true,
            'info' => 'Top Up Berhasil'
        ], 201);
    }
    //Last Line
}
