<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Usuario;

class ApiController extends Controller
{
    
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (Auth::once($credentials)) 
        {
         $user = Auth::user();
         
         return $user;
        }
        return response()->json(['error' => 'Usuario y/o clave inválido'], 401); 
    }
    
    public function register(Request $request)
    {
        try
        {
            if(!$request->has(['username','password','email','fullname']))
            {
                throw new \Exception('Se esperaba campos mandatorios');
            }
            
            $usuario = new Usuario();
            $usuario->username = $request->get('username');
            
    		$hash_pass = $request->get('password');
    		$usuario->password = password_hash($hash_pass, PASSWORD_DEFAULT);
    		
    		$usuario->email = $request->get('email');
    		$usuario->fullname = $request->get('fullname');
    		
    // 		if($request->hasFile('imagen') && $request->file('imagen')->isValid())
    // 		{
    //     		$imagen = $request->file('imagen');
    //     		$filename = $request->file('imagen')->getClientOriginalName();
        		
    //     		Storage::disk('images')->put($filename,  File::get($imagen));
        		
    //     		$producto->imagen = $filename;
    // 		}
    		
    		$usuario->save();
    	    
    	    return response()->json(['type' => 'success', 'message' => 'Registro completo'], 200);
    	    
        }catch(\Exception $e)
        {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    
}
