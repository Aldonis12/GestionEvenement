<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['nom','idtypesevent','idlieu','datedebut','heure','logistique','etat'];

    public function lieu(){
        return $this->belongsTo(Lieu::class, 'idlieu');
    }

    public function Element(){
        return $this->belongsTo(Element::class, 'logistique');
    }
}
