<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Personal1p10;
use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Votantes;


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



        $votante = new Votantes();
        $votante->gerencia_id = $request->gerencia_id;
        $votante->personal_id = $personal->id;
        $votante->ente_id = $request->ente_id;
        $votante->confirmed = 0;

        $votante->save();

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
    public function guardar(Request $request)
    {

         dd($funcionario);
        $cedula = $request->cedula;

        

        $personal_p = Personal1p10::where('cedula', $cedula)->count();
        

        if ($personal_p > 0) {
        
      
              $notification = array(
            'message' => '¡Esta persona ya existe!',
            'alert-type' => 'error'
        );
             return redirect()->back()->with($notification);
      


       

        }
        else
        {

      $count= Personal1p10::where('personal_id',$request->personal_id)->count();
     // dd($count);
      
      if ($count > 9) {
           $notification = array(
            'message' => '¡Solo se permiten 10 por funcionario!',
            'alert-type' => 'error'
        );
             return redirect()->back()->with($notification);
      }

        $personal = new Personal1p10();

        $personal->tx_nombres = $request->tx_nombres;
        $personal->tx_apellidos = $request->tx_apellidos;
        $personal->cedula = $request->cedula;
        $personal->telefono = $request->telefono;
        $personal->centro_electoral = $request->centro_electoral;
        $personal->fecha_emisison = date('d/m/Y');
        $personal->personal_id = $request->personal_id;
        $personal->usuario_id = \Auth::user()->id;
        $personal->estado_id = $request->estado_id;
        $personal->municipio_id = $request->municipio_id;
        $personal->parroquia_id = $request->parroquia_id;

        $personal->save();

         if ($personal) {
              $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
        }
        }

        

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function municipios($id)
    {
            
            $estado = Estado::find($id);
            $municipios = $estado->municipios;

            return \Response::json($municipios);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parroquias($id)
    {
            
            $municipios = Municipio::find($id);
            $parroquias = $municipios->parroquias;
           
            return \Response::json($parroquias);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function perosonal1x10($personal)
    {
        
        $funcionario = Personal::find($personal);
        $personales = Personal1p10::where('personal_id',$funcionario->id)->get();
        return view('admin.personal.1p10',compact('funcionario','personales')); 
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


      /**
     * Edit the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {


       $personales = Personal1p10::find($id);
       $funcionario = Personal::where('id',$personales->personal_id)->first();
    


        return view('admin.personal.editar',compact('personales','funcionario'));
    }

   public function guardareditado (Request $request,$id)
    {
       $personal = Personal1p10::find($id);
     
        $personal->tx_nombres = $request->tx_nombres;
        $personal->tx_apellidos = $request->tx_apellidos;
        $personal->cedula = $request->cedula;
        $personal->telefono = $request->telefono;
        $personal->centro_electoral = $request->centro_electoral;
        $personal->fecha_emisison = date('d/m/Y');
        //$personal->personal_id = $request->personal_id;
        $personal->usuario_id = \Auth::user()->id;
        $personal->estado_id = $request->estado_id;
        $personal->municipio_id = $request->municipio_id;
        $personal->parroquia_id = $request->parroquia_id;

        $personal->save();

         if ($personal) {
              $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success'
        );
             return redirect()->back()->with($notification);
        }


       
    }

}
