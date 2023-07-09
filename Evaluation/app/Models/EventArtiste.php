<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventArtiste extends Model
{
    protected $table = 'eventartiste';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idevent','idartiste','dureheure','tariftotal'];

    public function event(){
        return $this->belongsTo(Event::class, 'idevent');
    }

    public function artiste(){
        return $this->belongsTo(Artiste::class, 'idartiste');
    }
    
}
