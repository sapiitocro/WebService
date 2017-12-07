<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paradero extends Model 
{
    
    protected $paraderos = 'paraderos';
    
    protected $primaryKey = 'id_paradero';
    
    protected $keyType = 'varchar';
    
    //para remover la columna 'pivot' que aparece al hacer una relación de Many to Many
    protected $hidden = array('pivot');
    
    public $timestamps = false;
    
    public function paraderos(){
        
        return $this->belongsToMany('App\Models\Ruta', 'paradero_ruta', 'id_ruta', 'id_paradero');
        
    }
}
