<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualite extends Model
{
    protected $table = 'qualite';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['qualite'];

}
