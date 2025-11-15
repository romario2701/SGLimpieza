<?php

namespace App\Http\Controllers;

use App\Models\TareaLimpieza;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;

class TareaLimpiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=$request->user();

        $query= TareaLimpieza::with(['admin', 'personal'])->latest();
        
        if($user->role=='admin'){
            $tasks= $query->get();
        }
        elseif($user->role== 'personal'){
            $tasks= $query->where('personal_id', $user->id)->get();
        }
        else{
            $tasks= collect();
        }
        return view('tareas.index', [
            'tareas'=> $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        if ($request->user()->role != 'admin') {
        abort(403, 'Acción no autorizada.');
        }

        $personalDisponible= ModelsUser::where('role','personal')->get();
        return view('tareas.create',[
            'personalDisponible'=> $personalDisponible
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->user()->role != 'admin') {
        abort(403, 'Acción no autorizada.');
        }

       $validacion=$request->validate([
        'titulo'=>'required|string|max:255',
        'descripcion'=>'nullable|string',
        'prioridad'=>'required|in:baja,media,alta',
        'personal_id'=>'nullable|exists:users,id',
       ]);

       $taskData=$validacion;
       $taskData['admin_id']=$request->user()->id;

       TareaLimpieza::create($taskData);

       return redirect()->route('tareas.index')->with('success', '¡Tarea creada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TareaLimpieza $tareaLimpieza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {

        if ($request->user()->role != 'admin') {
        abort(403, 'Acción no autorizada.');
    }

        $tasks= TareaLimpieza::findOrFail($id);
        $personalDisponible= ModelsUser::where('role','personal')->get();

        return view('tareas.edit', [
            'task'=> $tasks,
            'personalDisponible'=> $personalDisponible
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->user()->role != 'admin') {
        abort(403, 'Acción no autorizada.');
        }

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'prioridad' => 'required|in:baja,media,alta',
            'personal_id'=> 'nullable|exists:users,id',
        ]);

        
        $task = TareaLimpieza::findOrFail($id);

       
        $task->update($validated);

        
        return redirect()->route('tareas.index')->with('success', '¡Tarea actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        if ($request->user()->role != 'admin') {
        abort(403, 'Acción no autorizada.');
        }

        $task = TareaLimpieza::findOrFail($id);
        $task->delete();
        return redirect()->route('tareas.index')->with('success','¡Tarea Eliminada!');
    }

    public function editStatus(Request $request, string $id)
    {
        $task = TareaLimpieza::findOrFail($id);

        if ($request->user()->role != 'admin' && $task->personal_id != $request->user()->id) {
            abort(403); 
        }

        return view('tareas.edit-status', [
            'task' => $task
        ]);
    }

    public function updateStatus(Request $request, string $id)
    {
        $task = TareaLimpieza::findOrFail($id);

        
        if ($request->user()->role != 'admin' && $task->personal_id != $request->user()->id) {
            abort(403); 
        }

        
        $validated = $request->validate([
            'estado' => 'required|in:pendiente,en_progreso,completada',
        ]);

        
        $task->update($validated);

        
        return redirect()->route('tareas.index')->with('success', '¡Estado de la tarea actualizado!');
    }
}
