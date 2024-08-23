<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Listar empleados en orden alfabético por apellidos y nombres
    public function index()
    {
        $empleados = Empleado::orderBy('apellidos')->orderBy('nombres')->get();
        return view('empleados.index', compact('empleados'));
    }

    // Mostrar formulario para crear un nuevo empleado
    public function create()
    {
        return view('empleados.create');
    }

    // Almacenar un nuevo empleado en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cedula' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ciudad' => 'required',
            'cargo' => 'required',
            'salario_base' => 'required|numeric',
        ]);

        Empleado::create($validatedData);
        return redirect()->route('empleados.index');
    }

    // Mostrar el formulario para editar un empleado
    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    // Actualizar la información del empleado
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
    
        // Validar los datos del formulario
        $request->validate([
            'cedula' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario_base' => 'required|numeric|min:0',
        ]);
    
        // Verificar que el salario no exceda los 10,000
        if ($request->input('salario_base') > 10000) {
            return redirect()->back()->withErrors(['salario_base' => 'El salario no puede superar C$10,000.'])->withInput();
        }
    
        // Actualizar los datos del empleado
        $empleado->update($request->all());
    
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }
    

    // Eliminar un empleado
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }

    public function show($id)
{
    $empleado = Empleado::findOrFail($id);
    return view('empleados.show', compact('empleado'));
}

public function aumentarSalario($id)
{
    $empleado = Empleado::findOrFail($id);

    // Verificar si el salario es menor a C$10,000
    if ($empleado->salario_base < 10000) {
        // Aumentar el salario en 1,000 o el valor que desees
        $empleado->salario_base += 1000;
        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Salario aumentado exitosamente.');
    }

    // En caso de que el salario sea igual o mayor a C$10,000
    return redirect()->route('empleados.index')->with('error', 'El salario no puede ser aumentado porque es igual o mayor a C$10,000.');
}




}


