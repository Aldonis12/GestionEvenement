<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPlace extends Model
{
    protected $table = 'eventplace';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idevent','idlieu','idtype','place','prix'];

    public function event(){
        return $this->belongsTo(Event::class, 'idevent');
    }

    public function lieu(){
        return $this->belongsTo(Lieu::class, 'idlieu');
    }

    public function types(){
        return $this->belongsTo(Categorie::class, 'idtype');
    }
}
