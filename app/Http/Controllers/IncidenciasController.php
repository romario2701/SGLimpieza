<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Illuminate\Http\Request;


class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencia = Incidencias::with('user')->latest()->get();

        return view('incidencias.index',[
            'incidencias'=> $incidencia
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate([
            'titulo'=> 'required|string|max:255',
            'descripcion'=> 'required|string|max:2000',
            'ubicacion'=> 'nullable|string|max:255',
        ]);

        $data=$validated;
        $data['user_id']=$request->user()->id;

        Incidencias::create($data);

        return redirect()->route('dashboard')->with('success','¡Gracias por tu reporte!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencias $incidencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $incidencia= Incidencias::with('user')->findOrFail($id);

        return view('incidencias.edit' ,[
            'incidencia'=> $incidencia
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated= $request->validate([
            'estado'=> 'required|string|in:pendiente,en_progreso,resuelto'
        ]);

        $incidencia= Incidencias::findOrFail($id);

        $incidencia->update([
            'estado'=>$validated['estado'],
        ]);

        return redirect()->route('incidencias.index')->with('success','¡Estado de la incidencia actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incidencia= Incidencias::findOrFail($id);

        $incidencia->delete();

        return redirect()->route('incidencias.index')->with('success','¡Incidencia Eliminada!');
    }
}
