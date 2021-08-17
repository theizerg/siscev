<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Log\LogSistema;
use App\Models\User;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:VerRole')->only('index'); 
        $this->middleware('permission:RegistrarRole')->only('create');
        $this->middleware('permission:RegistrarRole')->only('store');
        $this->middleware('permission:EditarRole')->only('edit');
        $this->middleware('permission:EditarRole')->only('update');
        $this->middleware('permission:VerRole')->only('show'); 

    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
       
        

       $roles = $roles->each(function ($role){
       $role->count_user = User::role($role->name)->count();
     });
        return view ('admin.roles.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $role = new Role();
        $role->name         = $request->name;
       
        $role->guard_name   = 'web';

        $role->save();

        if ($role) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success');

            return \Redirect::back()->with($notification);


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find(\Hashids::decode($id)[0]);

        $log = new LogSistema();
        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: '.auth()->user()->display_name.' Ha ingresado para editar el role en el sistema sistema: '.$role->name.' a las: '
        . date('H:m:i').' del día: '.date('d/m/Y');
        $log->save();
        return view('admin.roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find(\Hashids::decode($id)[0]);
        
        $role->name         = $request->name;
       
        $role->guard_name   = 'web';

        $role->save();

         if ($role) {
            
            $notification = array(
            'message' => '¡Datos ingresados!',
            'alert-type' => 'success');

            return \Redirect::back()->with($notification);


        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
