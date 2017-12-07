<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'rutas';
    
    protected $primaryKey = 'id_ruta';
    
    protected $keyType = 'varchar';
    
    public $timestamps = false;
    
    public function paraderos(){
        
        return $this->belongsToMany('App\Models\Paradero', 'paradero_ruta', 'id_ruta', 'id_paradero');
        
    }
    
    public function avenidas(){
        
        return $this->belongsToMany('App\Models\Avenida', 'avenida_ruta', 'id_ruta', 'id_avenida');
        
    }
}
