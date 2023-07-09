<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieLieu extends Model
{
    protected $table = 'categorielieu';
    
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = ['idlieu','idcategorie','place'];

    public function lieu(){
        return $this->belongsTo(Lieu::class, 'idlieu');
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class, 'idcategorie');
    }
}
