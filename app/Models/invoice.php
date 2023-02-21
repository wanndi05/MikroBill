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
                            'harga',
                            'harga_seller',
                            'track_bill',
                            'created_at',
                            'updated_at',
                            ];
    public $incrementing = false;
}
