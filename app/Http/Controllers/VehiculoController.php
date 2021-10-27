<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\EstadoVehiculo;
use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Vehiculo::join('estado as e','vehiculo as v','e.id','=','v.estado_id')
                ->join('tipo_vehiculo as t','t.id','=','v.tipo_vehiculo_id')
                ->orderBy('v.id','ASC')
                ->get(['v.id','v.patente','v.codigo','e.id as idestado','e.descripcion as estado',
                't.id as idtipo','t.descripcion as tipo']);
        return view('vehiculo.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = EstadoVehiculo::all();
        $tipo = TipoVehiculo::all();
        return view('vehiculo.create', compact('estado', 'tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patente'=>'required',
            'codigo'=>'required',
            'estado_id'=>'required',
            'tipo_vehiculo_id'=>'required'
        ]);
        $inputs =$request->all(); 
        Vehiculo::create($inputs);

        return redirect()->route('vehiculo.index')
                         ->with('success', 'Vehiculo registrado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo=Vehiculo::find($id);
        $estado = EstadoVehiculo::all();
        $tipo = TipoVehiculo::all();
        return view('vehiculo.edit', compact('vehiculo','estado','tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo=Vehiculo::find($id);
        $vehiculo->fill($request->all());
        $vehiculo->save();
        return redirect()->route('vehiculo.index')
                         ->with('success','Registro de vehiculo actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo=Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('vehiculo.index')
                         ->with('success','Registro de vehiculo eliminado.');
    }
}