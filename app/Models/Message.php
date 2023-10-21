<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'pesan']; // Sesuaikan dengan nama kolom pada tabel basis data
}
