<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'keterangan',
        'is_selesai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'is_selesai' => 'boolean',
        'tanggal_selesai' => 'datetime',
    ];
}