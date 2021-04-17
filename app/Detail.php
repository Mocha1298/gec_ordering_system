<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id_transaksi','id_menu','jumlah','catatan'
    ];
}
