<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDepense extends Model
{
    protected $table = 'eventdepense';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idevent','idautredepense','tarif'];

    public function event(){
        return $this->belongsTo(Event::class, 'idevent');
    }

    public function autredepense(){
        return $this->belongsTo(AutreDepense::class, 'idautredepense');
    }
}
