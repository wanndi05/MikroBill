<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable  = ['id',
                            'no_urut',
                            'username',
                            'id_rumah',
                            'id_paket',
                            'id_user',
                            'tgl_habis',
                            'tgl_bayar',
                            'harga',
                            'harga_seller',
                            'track_bill',
                            'status',
                            'created_at',
                            'updated_at',
                            ];
    public $incrementing = false;
}
