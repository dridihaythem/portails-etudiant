<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['specialite'];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function getNameAttribute()
    {
        return "{$this->specialite->prefix}{$this->level}{$this->number}";
    }
}
