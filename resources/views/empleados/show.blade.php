@extends('layouts.app')

@section('title', 'Detalles del Empleado')

@section('content')
<div class="container">
    <h1>Detalles del Empleado</h1>

    <div class="card">
        <div class="card-header">
            Información del Empleado
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Cédula</dt>
                <dd class="col-sm-9">{{ $empleado->cedula }}</dd>

                <dt class="col-sm-3">Nombres</dt>
                <dd class="col-sm-9">{{ $empleado->nombres }}</dd>

                <dt class="col-sm-3">Apellidos</dt>
                <dd class="col-sm-9">{{ $empleado->apellidos }}</dd>

                <dt class="col-sm-3">Ciudad</dt>
                <dd class="col-sm-9">{{ $empleado->ciudad }}</dd>

                <dt class="col-sm-3">Cargo</dt>
                <dd class="col-sm-9">{{ $empleado->cargo }}</dd>

                <dt class="col-sm-3">Salario Base</dt>
                <dd class="col-sm-9">{{ number_format($empleado->salario_base, 2) }} C$</dd>
            </dl>

            <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver a la Lista</a>
            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>

            <!-- Formulario para eliminar el empleado -->
            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
