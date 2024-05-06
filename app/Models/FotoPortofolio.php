<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPortofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_portofolio',
        'foto'
    ];
}
