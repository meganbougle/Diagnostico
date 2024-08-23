@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
<div class="container">
    <h1>Editar Empleado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $empleado->cedula }}" required>
        </div>
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $empleado->nombres }}" required>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $empleado->apellidos }}" required>
        </div>
        <div class="mb-3">
            <label for="ciudad" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $empleado->ciudad }}" required>
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" value="{{ $empleado->cargo }}" required>
        </div>
        <div class="mb-3">
            <label for="salario_base" class="form-label">Salario Base</label>
            <input type="number" class="form-control" id="salario_base" name="salario_base" value="{{ $empleado->salario_base }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

</div>
@endsection

@section('scripts')
<script>
document.querySelector('form').addEventListener('submit', function(event) {
    var salarioBase = parseFloat(document.querySelector('#salario_base').value);
    if (salarioBase > 10000) {
        event.preventDefault();
        alert('El salario no puede superar C$10,000.');
    }
});
</script>
@endsection