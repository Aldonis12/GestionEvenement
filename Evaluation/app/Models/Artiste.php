<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    protected $table = 'artiste';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','tarif','image'];
}
