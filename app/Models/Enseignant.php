<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Enseignant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPhotoAttribute($value)
    {
        if ($value == null) {
            return Storage::disk('students')->url('default.png');
        }
        return Storage::disk('students')->url($value);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
