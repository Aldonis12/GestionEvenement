<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutreDepense extends Model
{
    protected $table = 'autredepense';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom'];
}
