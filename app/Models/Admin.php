<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Admin extends  Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function getPhotoAttribute($value)
    {
        if ($value == null) {
            return Storage::disk('admins')->url('default.png');
        }
        return Storage::disk('admins')->url($value);
    }
}
