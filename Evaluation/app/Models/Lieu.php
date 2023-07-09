<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $table = 'lieu';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','place','image','idtypelieu'];
}
