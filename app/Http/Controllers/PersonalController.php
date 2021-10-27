<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Rango;
use App\Models\Labor;
use App\Models\TipoRango;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal=Personal::join('tipo_rango as tr','tr.id','=','rango.tipo_rango_id')
            ->join('rango','personal as p','rango.id','=','p.rango_id')
            ->join('labor','labor.id','=','p.labor_id')
            ->orderBy('p.id','ASC')
            ->get(['p.id','p.nombre','p.telefono','p.documento','p.direccion',
            'rango.id as idrango','rango.descripcion as rango','tr.descripcion as tiporango'
            'labor.id as idlabor','labor.nombre as labor']);
        return view('personal.index', ['personal' => $personal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rango=Rango::all();
        $labor=Labor::all();
        return view('personal.create', compact('rango','labor'));
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
            
            'nombre'=>'required',
            'telefono'=>'required',
            'documento'=>'required',
            'direccion'=>'required',
            'rango_id'=>'required',
            'labor_id'=>'required'
        ]);
        $inputs =$request->all(); 
        Personal::create($inputs);

        return redirect()->route('personal.index')
                         ->with('success', 'Personal registrado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal= Personal::find($id);
        $rango=Rango::all();
        $labor=Labor::all();
        return view('personal.edit', compact('personal','rango','labor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $personal=Personal::find($id);
        $personal->fill($request->all());
        $personal->save();
        return redirect()->route('personal.index')
                         ->with('success','Registro de personal actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal=Personal::findOrFail($id);
        $personal->delete();

        return redirect()->route('personal.index')
                         ->with('success','Registro de personal eliminado.');
    }
}