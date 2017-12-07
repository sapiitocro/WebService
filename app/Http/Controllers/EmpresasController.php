<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Empresa;
use App\Models\Ruta;
use App\Models\Paradero;

class EmpresasController extends Controller
{
    public function index()
    {
        $transportes = Empresa::orderBy("nombre")->get();
	    
	    return $transportes;
    }
    
    //Devuelve la ruta y los paraderos que le corresponden
    public function getRouteBustop($id){
        try
        {
            $ruta = Ruta::find($id)->paraderos;
            
            if($ruta == null)
                throw new \Exception('Registro no encontrado');
    		
            return $ruta;
    	    
        }catch(\Exception $e)
        {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
    //Devuelve todos los paraderos
    public function getAllBusStops(){
        
        $paraderos = Paradero::all();
        
        return $paraderos;
    }
    
    //Devuelve las de avenidas de una ruta en específico
    public function getAvenueRoute($id){
        try
        {
            $ruta = Ruta::find($id)->avenidas;
            
            if($ruta == null)
                throw new \Exception('Registro no encontrado');
    		
            return $ruta;
    	    
        }catch(\Exception $e)
        {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
