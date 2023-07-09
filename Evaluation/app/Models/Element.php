<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'element';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','idtypes','idqualite','tarif'];

    public function typemess(){
        return $this->belongsTo(Types::class, 'idtypes');
    }

    public function qualites(){
        return $this->belongsTo(Qualite::class, 'idqualite');
    }
}

