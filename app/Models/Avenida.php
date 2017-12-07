<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avenida extends Model
{
    protected $table = 'avenidas';
    
    protected $primaryKey = 'id_avenida';
    
    protected $keyType = 'varchar';
    
    protected $hidden = array('pivot');
    
    public $timestamps = false;
    
    public function rutas(){
        
        return $this->belongsToMany('App\Models\Ruta', 'avenida_ruta', 'id_ruta', 'id_avenida');
        
    }
}
