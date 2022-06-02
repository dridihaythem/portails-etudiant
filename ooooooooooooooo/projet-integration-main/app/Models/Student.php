<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['classe'];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function getPhotoAttribute($value)
    {
        if ($value == null) {
            return Storage::disk('students')->url('default.png');
        }
        return Storage::disk('students')->url($value);
    }
}
