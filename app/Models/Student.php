<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['classe'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function getPhotoAttribute($value)
    {
        return Storage::disk('students')->url($value);
    }
}
