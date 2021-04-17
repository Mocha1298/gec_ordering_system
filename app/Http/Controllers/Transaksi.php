<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Transaction;
use App\Menu;

class Transaksi extends Controller
{
    public function item_baru(Request $r)
    {
        return $r->id_transaksi;
        $entry = new Detail;
        $entry->id_transaksi = $r->id_transaksi;
        $entry->id_menu = $r->id_menu;
        $entry->jumlah = $r->jumlah;
        $entry->sub_total = $r->sub_total;
        $entry->catatan = $r->catatan;
        $entry->save();
        return response()->json($entry);
    }

    // public function item_edit($com, $id)
    // {
    //     return $id;
    //     $data =  Detail::find($id)->first();
    //     $id_menu = $data->id_menu;
    //     $data_menu = Menu::find($id_menu)->first();
    //     $harga = $data_menu->harga;
    //     $jumlah = $data->jumlah;
    //     // return $jumlah;
    //     if($com == 1){
    //         $jumlah += 1;
    //         $data->jumlah = $jumlah;
    //         $data->sub_total = $harga * $jumlah;
    //     }
    //     if($com == 0){
    //         $jumlah -= 1;
    //         $data->jumlah = $jumlah;
    //         $data->sub_total = $harga * $jumlah;
    //     }
    //     // return $data;
    //     $data->save();
    // }
    public function edit_add($id)
    {
        $data =  Detail::find($id);
        $id_menu = $data->id_menu;
        $data_menu = Menu::find($id_menu);
        $harga = $data_menu->harga;
        $jumlah = $data->jumlah;
        // return $jumlah;
        $jumlah += 1;
        $data->jumlah = $jumlah;
        $data->sub_total = $harga * $jumlah;
        $data->save();
    }

    public function edit_min($id)
    {
        $data =  Detail::find($id);
        $id_menu = $data->id_menu;
        $data_menu = Menu::find($id_menu);
        $harga = $data_menu->harga;
        $jumlah = $data->jumlah;
        // return $jumlah;
        $jumlah -= 1;
        $data->jumlah = $jumlah;
        $data->sub_total = $harga * $jumlah;
        $data->save();
    }

    public function item_hapus($id)
    {
        $data = Detail::find($id);
        $data->delete();
    }
}
