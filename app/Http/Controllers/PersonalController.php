<?php

namespace App\Http\Controllers;

use App\Models\Personal;
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
        $personales = Personal::get();
        return view ('admin.personal.index',compact('personales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        $personal = new Personal();

        $personal->tx_nombres = $request->tx_nombres;
        $personal->tx_apellidos = $request->tx_apellidos;
        $personal->cedula = $request->cedula;
        $personal->status = $request->status_id;
        $personal->ente_id =$request->ente_id;
        $personal->gerencia_id = $request->gerencia_id;
        $personal->usuario_id = \Auth::user()->id;

        $personal->save();

        if ($personal) {
              $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
        }
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
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //dd($request);
        $personal = Personal::find($id);

        $personal->tx_nombres = $request->tx_nombres;
        $personal->tx_apellidos = $request->tx_apellidos;
        $personal->cedula = $request->cedula;
        $personal->status = $request->status_id;
        $personal->ente_id =$request->ente_id;
        $personal->gerencia_id = $request->gerencia_id;
        $personal->usuario_id = \Auth::user()->id;

        $personal->save();

        if ($personal) {
              $notification = array(
            'message' => '¡Datos actualizados!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function borrar($id)
    {
         $gerencia = Personal::find($id);
        $gerencia->delete();

         $notification = array(
            'message' => '¡Datos eliminado!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
    }
}
