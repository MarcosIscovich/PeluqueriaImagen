<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['clientes']=Cliente::paginate(5);
        return view ('/clientes.index', $datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view ('/clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos= [
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Localidad' => 'required|string|max:100',            
            'Fecha_de_Nacimiento' => 'required|date',
            'Trabajo' => 'required|string|max:100',
            'Telefono' => 'required|string|max:100',
            'Foto' => 'required|max: 10000|mimes:jpeg,png,jpg',

        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida' 

        ];
        $this->validate($request, $campos, $mensaje);
        
        $datosCliente= request()->except('_token');

        if($request->hasFile('Foto')){

            $datosCliente['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Cliente::insert($datosCliente);
        return redirect('clientes')->with('mensaje','Cliente guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=Cliente::findorfail($id);
        return view ('clientes.edit', compact ('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos= [
            'Nombre' => 'required|string|max:100',
            'Apellido' => 'required|string|max:100',
            'Localidad' => 'required|string|max:100',
            'Fecha_de_Nacimiento' => 'required|date',
            'Trabajo' => 'required|string|max:100',
            'Telefono' => 'required|string|max:100',
            

        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
             

        ];

        if($request->hasFile('Foto')){

            $campos= ['Foto' => 'required|max: 10000|mimes:jpeg,png,jpg'];
            $mensaje = ['Foto.required' => 'La foto es requerida'];


        }
        $this->validate($request, $campos, $mensaje);


        $datosCliente = request()->except(['_token','_method']); 
        if($request->hasFile('Foto')){
            $cliente=Cliente::findorfail($id);
            Storage::delete('public/' . $cliente->Foto);
            $datosCliente['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Cliente::where('id','=',$id)->update($datosCliente);

        $cliente = Cliente::findorfail($id);
        //return view ('clientes.edit', compact ('cliente'))->with('mensaje','Cliente modificado con exito');
        return redirect('clientes')->with('mensaje','Cliente modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente=Cliente::findorfail($id);
        if (Storage::delete('public/' . $cliente->Foto)) {

            Cliente::destroy($id);

        }

        return redirect('clientes')->with('mensaje','Cliente eliminado con exito');
        
    }
}
