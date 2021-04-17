<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Transaction;
use App\Detail;
use DB;

class Tampil extends Controller
{
    public function tampil_menu()
    {
        $data = Menu::join('types','menus.id_jenis','=','types.id')
        ->select('menus.*','types.nama as tipe')
        ->get();
        return view('menu_makanan',['data'=>$data]);
    }
    public function cek_old($id)
    {
        $transaksi = Transaction::where('id_pengguna',$id)->orderBy('created_at','desc')->where('status',0)->first();
        $count_t = $transaksi->count();
        
        if($count_t > 0){
            // return $transaksi;
            $id_transaksi = $transaksi->id;
            $detail = Detail::where('id_transaksi',$id_transaksi)
            ->join('menus','menus.id','details.id_menu')
            ->join('types','types.id','menus.id_jenis')
            ->select('details.*','menus.nama','menus.harga','menus.id_jenis','menus.photo','types.nama as tipe')
            ->get();
            // return $detail;
            $count_d = $detail->count();

            if($count_d > 0){
                $data = ["id_transaksi"=>$id_transaksi,"fuel"=>true,"data"=>$detail];
                return response()->json($data);
            }
            else{
                $data = ["id_transaksi"=>$id_transaksi,"fuel"=>false];
                return response()->json($data);
            }
        }
        else{
            $entry = new Transaction;
            $entry->total = 0;
            $entry->id_pengguna = 1;
            $entry->status = 0;
            $entry->save();
            $id = $entry->id;
            $data = ["id_transaksi"=>$id_transaksi,"fuel"=>false];
            return response()->json($data);
        }
    }
}


// Transaksi yang belum selesai memungkinkan untuk tidak adanya detail (belanjaan)
// Jika ada transaksi belum selesai dan tidak ada detail maka sistem akan mengeluarkan idnya saja
// Namun jika ada transaksi yang memiliki detail maka akan di passing datanya
