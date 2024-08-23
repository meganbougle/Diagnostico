@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
<div class="container">
    <h1>Crear Nuevo Empleado</h1>

    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" required>
        </div>
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" required>
        </div>
        <div class="mb-3">
            <label for="salario_base" class="form-label">Salario Base</label>
            <input type="number" class="form-control" id="salario_base" name="salario_base" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection