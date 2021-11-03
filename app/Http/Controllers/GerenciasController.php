<?php

namespace App\Http\Controllers;

use App\Models\Gerencias;
use Illuminate\Http\Request;

class GerenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gerencias = Gerencias::get();
        return view ('admin.gerencias.index',compact('gerencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.gerencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gerencia =new Gerencias();

        $gerencia->ente_id = $request->ente_id;
        $gerencia->descricion = $request->descricion;
       

        $gerencia->save();

        if ($gerencia <> null) {
            
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
     * @param  \App\Models\Gerencias  $gerencias
     * @return \Illuminate\Http\Response
     */
    public function show(Gerencias $id)
    {
       
        
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gerencias  $gerencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Gerencias $gerencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gerencias  $gerencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $gerencia = Gerencias::find($id);
        //dd($gerencia);

        $gerencia->ente_id = $request->ente_id;
        $gerencia->descricion = $request->descricion;
       

        $gerencia->save();

        if ($gerencia <> null) {
            
             $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gerencias  $gerencias
     * @return \Illuminate\Http\Response
     */
    public function borrar($id)
    {
        $gerencia = Gerencias::find($id);
        $gerencia->delete();

         $notification = array(
            'message' => '¡Datos eliminado!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
    }
}
