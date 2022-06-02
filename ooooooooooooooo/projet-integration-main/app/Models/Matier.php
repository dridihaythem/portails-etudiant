<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Matier extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'libelle', 'coefficient'
    ];
}