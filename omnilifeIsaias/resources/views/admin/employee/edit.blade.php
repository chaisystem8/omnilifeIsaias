@extends('plantilla.admin')

@section('titulo', 'Crear Empleado')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.employee.index')}}">Empleados</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('estilos')
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection


    @section('contenido')

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach                    
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.employee.update',$empleado->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <section class="content">
            <div class="container-fluid">
                <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del Empleado</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $empleado->nombre }}">

                            <label>Codigo</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" value="{{ $empleado->codigo }}">

                            <label>Correo</label>
                            <input class="form-control" type="email" name="correo" id="correo" value="{{ $empleado->correo }}">

                            <label>Salario en Pesos</label>
                            <input class="form-control" type="text" name="salarioPesos" id="salarioPesos" value="{{ $empleado->salarioPesos }}">
                        </div>  
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">

                            <label>Direccion</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="{{ $empleado->direccion }}">

                            <label>Estado</label>
                            <input class="form-control" type="text" name="estado" id="estado" value="{{ $empleado->estado }}">

                            <label>Ciudad</label>
                            <input class="form-control" type="text" name="ciudad" id="ciudad" value="{{ $empleado->ciudad }}">

                            <label>Telefono</label>
                            <input class="form-control" type="text" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
                            
                        </div>

            
                    </div>

                    </div>



                </div>

                <div class="card-footer">
                
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                    <div class="form-group float-right">

                        <a class="btn btn-danger" href="{{ route('cancelar','admin.employee.index') }}">Cancelar</a>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    
                    </div>
    
                    
                    </div>
        
            </div>

            </div>
            </section>


        </form>
    

 @endsection   