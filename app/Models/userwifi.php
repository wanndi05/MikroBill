<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userwifi extends Model
{
    protected $table = 'userwifis';
    protected $fillable  = ['id',
                            'no_urut',
                            'id_rumah',
                            'id_paket',
                            'username',
                            'password',
                            'tgl_habis',
                            'tgl_bayar',
                            'created_at',
                            'updated_at'
                            ];
}
