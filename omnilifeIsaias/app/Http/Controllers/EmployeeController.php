<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    
 

    public function index()     
    {
        $empleados = Employee::orderBy('nombre')->get();
        return view('admin.employee.index', compact('empleados'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        
        $respuesta =Http::get('https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos?token=0fce7d85c76c9afa6f8ef05f95d50a11c62573c637d28706e28f2a81e84264e5');
        $respuesta->json();
        $datos = $respuesta["bmx"]["series"][0]["datos"];
        $ultimosdatos = end($datos);
        $valorActual = doubleval($ultimosdatos['dato']);

        // dd(doubleval($ultimosdatos['dato']));

        $request->validate([
            'nombre' => 'required|max:120',
            'codigo' => 'required|max:40|unique:employees,codigo,',
            'correo' => 'required|email|unique:employees',
            'salarioPesos' => 'required|numeric|min:0|not_in:0'
        ]);

        $empleado = new Employee;

        $empleado->nombre  = $request->nombre;
        $empleado->codigo  = $request->codigo;
        $empleado->salarioDolores  = doubleval($request->salarioPesos) / $valorActual;
        $empleado->salarioPesos  = $request->salarioPesos;
        $empleado->direccion  = $request->direccion;
        $empleado->estado  = $request->estado;
        $empleado->ciudad  = $request->ciudad;
        $empleado->telefono  = $request->telefono;
        $empleado->correo  = $request->correo;

        $empleado->save();

        return redirect()->route('admin.employee.index')->with('datos','Registro actualizado correctamente!');

    }

   
    public function show($id)
    {
        $empleado = Employee::where('id',$id)->firstOrFail();
        return view('admin.employee.show',compact('empleado'));
    }


    public function edit($id)
    {
        $empleado = Employee::where('id',$id)->firstOrFail();
        return view('admin.employee.edit',compact('empleado'));
    }


    public function update(Request $request, $id)
    {
        $empleado = Employee::findOrFail($id);

        $respuesta =Http::get('https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos?token=0fce7d85c76c9afa6f8ef05f95d50a11c62573c637d28706e28f2a81e84264e5');
        $respuesta->json();
        $datos = $respuesta["bmx"]["series"][0]["datos"];
        $ultimosdatos = end($datos);
        $valorActual = doubleval($ultimosdatos['dato']);

     
        $request->validate([
            'nombre' => 'required|alpha|max:120',
            'codigo' => 'required|max:40|unique:employees,codigo,'.$empleado->id,
            'correo' => 'required|email',
            'salarioPesos' => 'required|numeric|min:0|not_in:0'
        ]);

        $empleado->nombre  = $request->nombre;
        $empleado->codigo  = $request->codigo;
        $empleado->salarioDolores  = doubleval($request->salarioPesos) / $valorActual;
        $empleado->salarioPesos  = $request->salarioPesos;
        $empleado->direccion  = $request->direccion;
        $empleado->estado  = $request->estado;
        $empleado->ciudad  = $request->ciudad;
        $empleado->telefono  = $request->telefono;
        $empleado->correo  = $request->correo;

        $empleado->save();

        return redirect()->route('admin.employee.index')->with('datos','Empleado actualizado correctamente!');
    }


    public function destroy($id)
    {
        $empleado =Employee::findOrFail($id);

        $empleado->delete();

        return redirect()->route('admin.employee.index')->with('datos','Registro eliminado correctamente!');
    }

    public function admin()
    {
        return view('plantilla.admin');
    }
}
