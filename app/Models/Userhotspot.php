<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wifirumah extends Model
{
    protected $table = 'userhotpot';
    protected $fillable  = ['id',
                            'no_urut',
                            'nama_rumah',
                            'alamat',
                            'nomor_hp',
                            'penanggungjawab',
                            'nik',
                            'npwp',
                            'latitude',
                            'longitude',
                            'created_at',
                            'updated_at'
                            ];
    public $incrementing = false;
}
