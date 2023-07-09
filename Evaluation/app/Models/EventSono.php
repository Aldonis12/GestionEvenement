<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSono extends Model
{
    protected $table = 'eventsono';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idevent','idsono','dureheure','nombre','tariftotal'];

    public function event(){
        return $this->belongsTo(Event::class, 'idevent');
    }
    public function sonorisation(){
        return $this->belongsTo(Element::class, 'idsono');
    }
}
