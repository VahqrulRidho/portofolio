<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_resume',
        'judul',
        'deskripsi',
    ];

    public function Resumes()
    {
        return $this->belongsTo(Resume::class, 'id_resume');
    }
}
