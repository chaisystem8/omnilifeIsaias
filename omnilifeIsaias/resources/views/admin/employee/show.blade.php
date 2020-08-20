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
                            <input readonly class="form-control" type="text" name="nombre" id="nombre" value="{{ $empleado->nombre }}">

                            <label>Codigo</label>
                            <input readonly class="form-control" type="text" name="codigo" id="codigo" value="{{ $empleado->codigo }}">

                            <label>Correo</label>
                            <input readonly class="form-control" type="email" name="correo" id="correo" value="{{ $empleado->correo }}">

                            <label>Salario en Pesos</label>
                            <input readonly class="form-control" type="text" name="salarioPesos" id="salarioPesos" value="{{ $empleado->salarioPesos }}">
                        </div>  
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">

                            <label>Direccion</label>
                            <input readonly class="form-control" type="text" name="direccion" id="direccion" value="{{ $empleado->direccion }}">

                            <label>Estado</label>
                            <input readonly class="form-control" type="text" name="estado" id="estado" value="{{ $empleado->estado }}">

                            <label>Ciudad</label>
                            <input readonly class="form-control" type="text" name="ciudad" id="ciudad" value="{{ $empleado->ciudad }}">

                            <label>Telefono</label>
                            <input readonly class="form-control" type="text" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
                            
                        </div>

                    </div>

                    </div>

                    



                </div>

                <div class="card-footer">
                    

                    <div class="card-body table-responsive p-0" style="height: 600px;">
                        <table class="table table-head-fixed">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Salario en dolares</th>
                                <th>Salario en pesos</th>

                            </tr>
                            </thead>
                            <tbody>
                                    @for ($i = 0; $i < 6; $i++)
                                    @php
                                        if ($i < 1) {
                                            $pesos = ($empleado->salarioPesos);
                                            $dolar = ($empleado->salarioDolores);
                                            $date = date('d-m-Y');
                                        }else{
                                            $pesos = $pesosAnt;
                                            $dolar = $dolarAnt;
                                            $date = $dateAnt;
                                        }

                                    @endphp
                                     
                                    
                                    <tr>
                                        <td> {{ $date }}</td>            
                                        <td> {{ '$'.number_format($pesos,2)}}</td>
                                        <td> {{ '$'.number_format($dolar,2)}}</td>                                                           
                                    </tr>

                                    @php
                                        $dateAnt = date('d-m-Y',strtotime($date."+ 1 month"));
                                        $pesosAnt = ($pesos)*.03 +  $pesos; 
                                        $dolarAnt = ($dolar)*.03 +  $dolar;   
                                    @endphp
                                    @endfor
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
            


            <div class="row">
                    <div class="col-md-12">
                    <div class="form-group float-right">

                        <a class="btn btn-danger" href="{{ route('cancelar','admin.employee.index') }}">Cancelar</a>

                        <a class="btn btn-info" href="{{ route('admin.employee.edit', $empleado->id)}}"> <i class="fa fa-edit" aria-hidden="true"></i> </a> 
                    </div>
    
                    
                    </div>
        
            </div>

            </div>
            </section>


        </form>
    

 @endsection   