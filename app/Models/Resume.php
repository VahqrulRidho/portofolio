<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function resumeDetails()
    {
        return $this->hasMany(ResumeDetail::class);
    }
}
