<?php

namespace App\Http\Controllers;

use App\Models\Actividades;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dato['actividad']=Actividades::paginate(5);
        return view('actividades.index', $dato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('actividades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validar datos

        $campos = [
            'Tarea' => 'required|string|max:100',
            'Description' => 'required|string|max:100',
            'Status' => 'required|string|max:100',
            'start_date' => 'required|date|after:now',
            'end_date' => 'required|date|after:start_date',
        ];

        $mensaje=[
            'required'=>'El :atribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosActividad = request()->all();
        $datosActividad = request()->except('_token');
        Actividades::insert($datosActividad);

        //return response()->json($datosActividad);
        return  redirect('actividades')->with('mensaje', 'Actividad Registrada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function show(Actividades $actividades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actividades=Actividades::findOrFail($id);

        return view('actividades.edit', compact('actividades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        $datosActividad = request()->except(['_token', '_method']);
        Actividades::where('id','=',$id)->update($datosActividad);

        $actividades=Actividades::findOrFail($id);
        //return view('actividades.edit', compact('actividades'));
        return redirect('actividades')->with('mensaje', 'Actividad Actualizada Con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Actividades::destroy($id);
        return redirect('actividades')->with('mensaje', 'Actividad Eliminada Con Éxito');
    }
}
