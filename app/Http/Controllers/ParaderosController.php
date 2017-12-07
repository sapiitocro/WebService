<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Paradero;

class ParaderosController extends Controller
{
    public function index()
    {
        $paraderos = Paradero::orderBy("nombre")->get();
	    
	    return $paraderos;
    }
}
