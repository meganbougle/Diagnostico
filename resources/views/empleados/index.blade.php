@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Empleado</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Ciudad</th>
                <th>Cargo</th>
                <th>Salario Base</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->cedula }}</td>
                <td>{{ $empleado->nombres }}</td>
                <td>{{ $empleado->apellidos }}</td>
                <td>{{ $empleado->ciudad }}</td>
                <td>{{ $empleado->cargo }}</td>
                <td>{{ $empleado->salario_base }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
