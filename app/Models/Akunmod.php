<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profilpaket extends Model
{
    protected $table = 'users';
    protected $fillable = [
                            'id',
                            'name',
                            'email',
                            'email_verified_at',
                            'password',
                            'remember_token',
                            'level',
                            'created_at',
                            'updated_at'
                        ];
    public $incrementing = false;
}
