<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;


class jsController extends Controller
{
    public function principal(){
        return view('principal');
    }
    public function Graficos(){
        return view('Graficos');
    }
    public function login(){
        return view('login');
    }
    public function logoun(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'pass'=>'required'
        ]);
    
        $email = $request->input('email');
        $pass = $request->input('pass');
        //dd($request->all());
        // Realizar la solicitud a la API
        $response = Http::get('http://localhost:3000/api_KBJ/admin/', [
            'email' => $email,
            'pass' => $pass
        ]);
        
        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json();
            //dd($data);    
            // Verificar si hay datos de administrador en la respuesta
            if (!empty($data['admin'])) {
                // Redireccionar a la ruta de AdminRegistros
                return redirect()->route('AdminRegistros');
            }
        }
        
        // Si la autenticación falla, redireccionar a la lista con un mensaje de error
        return redirect()->route('login')->with('error', 'Credenciales inválidas');
    }
    //----------------------- FUNCIONES DE ADMIN -----------------------
    //----- FUNCIONES DE ALTA -------
    public function AdminAlta(){
        return view('AdminAlta');
    }
    
    public function guardar(Request $request){
        
        $request->validate([
            'nombre'=> 'required',
            'app'=> 'required',
            'apm'=> 'required',
            'fn'=> 'required',
            'sexo'=> 'required',
            'email'=>'required',
            'pass'=>'required',
            'activo'=>'required',
        ]);
        if($request->file('foto') !=''){
            //obtener el campo file definido en el formulario
            $file=$request->file('foto');
            //obtner el nombre del archivo (file)
            $img =$file->getClientOriginalName();
            //obtener fecha y hora
            $idate = date('Ymd_His_');
            $img2= $idate.$img;
            // indicamos el nombre y la ruta donde se almacena el archivo (file)
            \Storage::disk('local')->put($img2, \File::get($file));
        
        }
        else{
            $img2="img-defecto.png";
        }


            //Crear un nuevo registro en la DB-API node.js
        $response = Http::post('http://localhost:3000/api_KBJ/admin',[
            'nombre'=>$request->nombre,
            'app'=>$request->app,
            'apm'=>$request->apm,
            'fn'=>$request->fn,
            'sexo'=>$request->sexo,
            'email'=>$request->email,
            'pass'=>$request->pass,
            'foto'=>$img2,
            'activo'=>$request->activo,
        ]);
        return redirect()->route('principal');
    }
    //----- FUNCIONES DE MOSTRAR TODOS LOS REGISTROS
    public function AdminRegistros(){
        $url ='http://localhost:3000/api_KBJ/admin';
        $response = Http::get($url);
        $datos =$response->json();

        return view('AdminRegistros')
            ->with('datos',$datos);
    }
    
    public function consulta(){
        $url ='http://localhost:3000/api_KBJ/admin';
        $response = Http::get($url);
        $datos =$response->json();

        return view('AdminRegistros')
            ->with('datos',$datos);
    }
    public function borrar($id_admin){
        //hacer la solicitud HTTP para eliminar el registro en la API-Node.js
        $response = Http::delete('http://localhost:3000/api_KBJ/admin/'.$id_admin);

        return redirect()->route('AdminRegistros');
    }

    //----------------------------------------------------------------------------
    public function AdminModificar(){
        $admin = $this->obtenerDetalleAlumno($id_admin);
        return view('AdminModificar', ['admin' => $admin]);
    }
    public function mostrarModificar($id_admin) {
        $admin = $this->obtenerDetalleAlumno($id_admin);
        return view('AdminModificar', ['admin' => $admin]);
    }
    
    public function obtenerDetalleAlumno($id_admin) {
        // Hacer la solicitud HTTP para obtener los detalles del alumno por su ID
        $response = Http::get('http://localhost:3000/api_KBJ/admin/' . $id_admin);
        $admin = $response->json();
        return $admin;
    }
    public function AdminDetalle($id_admin){
        $admin = $this->obtenerDetalleAlumno($id_admin);
        return view('AdminDetalle', ['admin' => $admin]);
    }
    public function modificar(Request $request, $id_admin){

        if($request->file('foto1') !=''){
            //--------------------------------------
                //------------ obtenemos el campo file definido en el formulario
                $file =$request->file('foto1');
                //------------ obtenemos el nombre del archivo (file)
                    $img = $file->getClientOriginalName();
                    //$img = $request->('img');->getClientOriginalName();
            //obtner fecha y hora
                $ldate= date('Ymd_His_'); // obtenemos la fecha y hora
                $img2 =$ldate . $img;  //concatena la fecha y hora cpon el nombre del Archivo (file)
            // indicamos el nombre y la ruta donde se almacena el Archivo (file)
            \Storage::disk('local')->put($img, \File::get($file));
        //-------------------------------------------
        }
        else{
            $img2=$request->foto2;
        }
        

        $request->validate([
            'nombre'=> 'required',
            'app'=> 'required',
            'apm'=> 'required',
            'fn'=> 'required',
            'sexo'=> 'required',
            'email'=>'required',
            'pass'=>'required',
            'activo'=>'required',
        ]);
        
        //obtner los datos del formulario
        $datos =$request->only(['nombre','app','apm','fn','sexo','email','pass','foto','activo']);

        // Hacer la solicitus HTTP para modificcar el registro en la api node.js
        $response = Http::put('http://localhost:3000/api_KBJ/admin/'.$id_admin, $datos);
        
        return redirect()->route('AdminRegistros');
    }
    //----------------- FUNCIONES DE ABECEDARIO---------------------------
    //----- FUNCIONES DE ALTA DE ABECEDARIO -------
    public function AbcAlta(){
        return view('AbcAlta');
    }
    
    public function Abcguardar(Request $request){
        
        $request->validate([
            'letra'=> 'required',
            
            
        ]);
        //------------------- Guardar la foto------------------------
        if($request->file('foto') !=''){
            //obtener el campo file definido en el formulario
            $file=$request->file('foto');
            //obtner el nombre del archivo (file)
            $img =$file->getClientOriginalName();
            //obtener fecha y hora
            $idate = date('Ymd_His_');
            $img2= $idate.$img;
            // indicamos el nombre y la ruta donde se almacena el archivo (file)
            \Storage::disk('local')->put($img2, \File::get($file));
        
        }
        else{
            $img2="img-defecto.png";
        }
        //---------------------- Guardar el sonido ---------------------
        if ($request->hasFile('sonido')) {
            // Obtener el campo file definido en el formulario
            $file = $request->file('sonido');
            // Obtener el nombre del archivo (file)
            $sonido = $file->getClientOriginalName();
            // Obtener fecha y hora
            $date = date('Ymd_His_');
            $sonido2 = $date . $sonido;
            // Indicar el nombre y la ruta donde se almacenará el archivo (file)
            $path = 'sonido/' . $sonido2; // Ruta dentro de la carpeta public/sonido
            $file->move(public_path('sonido'), $sonido2); // Mover y guardar el archivo en la carpeta public/sonido
        } else {
            // Si no se proporciona un archivo de sonido, se puede asignar un valor predeterminado o manejarlo según la lógica de tu aplicación
            $sonido2 = "sonido-defecto.mp3";
        }
            

            //Crear un nuevo registro en la DB-API node.js
        $response = Http::post('http://localhost:3000/api_KBJ/letra',[
            'letra'=>$request->letra,
            'sonido'=>$sonido2,
            'foto'=>$img2,
            'activo'=>$request->activo,
            
        ]);
        return redirect()->route('AbcRegistros');
    }
    //----- FUNCIONES DE MOSTRAR TODOS LOS REGISTROS DE ABECEDARIO----------------------
    public function AbcRegistros(){
        $url ='http://localhost:3000/api_KBJ/letra';
        $response = Http::get($url);
        $valores =$response->json();

        return view('AbcRegistros')
            ->with('valores',$valores);
    }
    public function AbcRegistrosUsua(){
        $url ='http://localhost:3000/api_KBJ/letra';
        $response = Http::get($url);
        $valores =$response->json();

        return view('AbcRegistrosUsua')
            ->with('valores',$valores);
    }
    public function consultaAbc(){
        $url ='http://localhost:3000/api_KBJ/letra';
        $response = Http::get($url);
        $valores =$response->json();

        return view('AbcRegistros')
            ->with('valores',$valores);
    }
    public function obtenerDetalleAbc($id_abecedario) {
        // Hacer la solicitud HTTP para obtener los detalles del abecedario por su ID
        $response = Http::get('http://localhost:3000/api_KBJ/letra/' . $id_abecedario);
        $abecedario = $response->json();
        return $abecedario;
    }
    public function AbcDetalle($id_abecedario){
        $abecedario = $this->obtenerDetalleAbc($id_abecedario);
        return view('AbcDetalle', ['abecedario' => $abecedario]);
    }
    public function Abcborrar($id_abecedario){
        //hacer la solicitud HTTP para eliminar el registro en la API-Node.js
        $response = Http::delete('http://localhost:3000/api_KBJ/letra/'.$id_abecedario);

        return redirect()->route('AbcRegistros');
    }

    //-----------------------------Modificar-----------------------------
    public function AbcModificar(){
        $abecedario = $this->oobtenerDetalleAbc($id_abecedario);
        return view('AbcModificar', ['abecedario' => $abecedario]);
    }
    public function AbcmostrarModificar($id_abecedario) {
        $abecedario = $this->obtenerDetalleAbc($id_abecedario);
        return view('AbcModificar', ['abecedario' => $abecedario]);
    }
    public function modi(Request $request, $id_admin){

        //-------------------------GUARDAR CAMBIO DE FOTO ---------------------
        if($request->file('foto1') !=''){
            //--------------------------------------
                //------------ obtenemos el campo file definido en el formulario
                $file =$request->file('foto1');
                //------------ obtenemos el nombre del archivo (file)
                    $img = $file->getClientOriginalName();
                    //$img = $request->('img');->getClientOriginalName();
            //obtner fecha y hora
                $ldate= date('Ymd_His_'); // obtenemos la fecha y hora
                $img2 =$ldate . $img;  //concatena la fecha y hora cpon el nombre del Archivo (file)
            // indicamos el nombre y la ruta donde se almacena el Archivo (file)
            \Storage::disk('local')->put($img, \File::get($file));
        //-------------------------------------------
        }
        else{
            $img2=$request->foto2;
        }

        //---------------------- Guardar el sonido ---------------------
        if ($request->file('sonido1')) {
            // Obtener el campo file definido en el formulario
            $file = $request->file('sonido1');
            // Obtener el nombre del archivo (file)
            $sonido = $file->getClientOriginalName();
            // Obtener fecha y hora
            $ldate = date('Ymd_His_');
            $sonido2 = $ldate . $sonido;
            // Indicar el nombre y la ruta donde se almacenará el archivo (file)
            \Storage::disk('local')->put($sonido, \File::get($file));
        } else {
            // Si no se proporciona un archivo de sonido, se puede asignar un valor predeterminado o manejarlo según la lógica de tu aplicación
            $sonido2 = $request->sonido3;
        }
        $request->validate([
            'letra'=> 'required',
            'activo'=> 'required',
            
        ]);

        //obtner los datos del formulario
        $datos =$request->only(['letra','sonido','foto','activo']);

        // Hacer la solicitus HTTP para modificcar el registro en la api node.js
        $response = Http::put('http://localhost:3000/api_KBJ/letra/'.$id_abecedario, $datos);

        return redirect()->route('AdminRegistros');
    }
    public function Abcbuscar(Request $request)
    {
        $query = $request->input('query'); // Obtener el término de búsqueda desde la URL
        
        // Lógica de búsqueda (puedes usar Eloquent o el Query Builder de Laravel)
        $resultados = TuModelo::where('campo', 'like', "%$query%")->get();
        
        // Pasar los resultados a la vista
        return view('resultado', compact('resultados', 'query'));
    }
}
