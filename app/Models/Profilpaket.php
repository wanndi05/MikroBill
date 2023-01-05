<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilpaket extends Model
{
    protected $table = 'profilpakets';
    protected $fillable  = ['id',
                            'no_urut',
                            'nama_paket',
                            'harga',
                            'harga_seller',
                            'lama_paket',
                            'satuan_lama_paket',
                            'created_at',
                            'updated_at',
                            ];
    public $incrementing = false;
}
