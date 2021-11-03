<?php

namespace App\Http\Controllers;

use App\Models\Votantes;
use App\Models\Personal;
use App\Models\Gerencias;
use Illuminate\Http\Request;

class VotantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $votantes = Votantes::get();

       return view ('admin.votantes.index', compact('votantes'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listado()
    {
       $votantes = Votantes::where('confirmed',1)
       ->get();

       return view ('admin.votantes.listado', compact('votantes'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function noejercidos()
    {
       $votantes = Votantes::where('confirmed',0)
       ->get();
       //dd($votantes);

       return view ('admin.votantes.novotos', compact('votantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resultado()
    {
         return view ('admin.votantes.resultados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function personal($id)
    {
       $personal = Personal::where('gerencia_id',$id)->get();
       return $personal;
    }



   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function gerencia($id)
    {
       $gerencias = Gerencias::where('ente_id',$id)->get();
       return $gerencias;
    }




    public function votante(Request $request)
    {   
          //dd($request);

           $voto = Votantes::where('gerencia_id',$request->estado_id)
           ->where('confirmed',1)
           ->count();

            $Novoto = Votantes::where('gerencia_id',$request->estado_id)
           ->where('confirmed',0)
           ->count();
            
           $gerencia = Gerencias::find($request->estado_id);
           $descripcion = $gerencia->descricion;

          
           return view('admin.votantes.resultados',compact('voto','Novoto','descripcion'));
     }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $votante = Votantes::where('personal_id',$request->personal_id)->count();

        if ($votante <> 0) {
            
             $notification = array(
            'message' => '¡El funcionario ya existe!',
            'alert-type' => 'error'
        );
             return redirect()->back()->with($notification);
        }

        $votos = new Votantes();

       $votos->gerencia_id = $request->gerencia_id;
       $votos->ente_id = $request->ente_id;
       $votos->personal_id = $request->personal_id;
       $votos->confirmed = $request->confirmed;

       $votos->save();

         $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Votantes  $votantes
     * @return \Illuminate\Http\Response
     */
    public function show(Votantes $votantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Votantes  $votantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Votantes $votantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Votantes  $votantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votantes $votantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Votantes  $votantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votantes $votantes)
    {
        //
    }
}
