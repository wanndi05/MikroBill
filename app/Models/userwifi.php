<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userwifi extends Model
{
    protected $table = 'userwifis';
    protected $fillable  = ['id',
                            'nomor_hp',
                            'username',
                            'password',
                            'nama_paket',
                            'harga',
                            'lama_paket',
                            'satuan_lama_paket',
                            'tgl_habis',
                            'created_at',
                            'updated_at'
                            ];
}
