@extends('plantilla.admin')

@section('titulo',' Administración de Empleados')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<div class="card-body table-responsive p-0" style="height: 600px;">
    <a class="btn btn-primary float-right m-2" href="{{ route('admin.employee.create')}}"> Crear</a>
    <table class="table table-head-fixed">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Salario en dolares</th>
            <th>Salario en pesos</th>
            <th>Correo</th>
            <th>Estatus</th>
            <th colspan="4">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td> {{ $empleado->codigo }}</td>
                    <td> {{ $empleado->nombre }}</td>
                    <td> {{ $empleado->salarioPesos }}</td>
                    <td> {{ $empleado->salarioDolores }}</td>
                    <td> {{ $empleado->correo }}</td>
                    <td> 
                        @if ( $empleado->activo === 0)
                            Inactivo
                        @else
                            Activo
                        @endif  
                    </td>
                    <td> 
                        @if ( $empleado->activo === 0)
                            <form method="put" action="{{url('admin/employee/'.$empleado->id)}}">
                                <input type="hidden" id="status" value="1">                          
                                <button class="btn btn-success" type="submit">Activar</button>
                            </form>                        
                        @else
                        <form method="put" action="{{url('admin/employee/'.$empleado->id)}}">
                            <input type="hidden" id="status" value="1">                          
                            <button class="btn btn-danger" type="submit">Desactivar</button>
                        </form>
                            
                        @endif                                        
                    </td>
                    <td> 
                        <a class="btn btn-info" href="{{ route('admin.employee.show', $empleado->id)}}"> <i class="fa fa-user" aria-hidden="true"></i> </a> 
                    </td>
                    <td> 
                        <a class="btn btn-info" href="{{ route('admin.employee.edit', $empleado->id)}}"> <i class="fa fa-edit" aria-hidden="true"></i> </a> 
                    </td>
                    
                    <td> 
                        <form method="post" action="{{url('admin/employee/'.$empleado->id )}}">
                            @csrf
                            {{ @method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Deseas borrar el empleado')">Eliminar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection('contenido')