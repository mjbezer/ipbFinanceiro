<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membros;
use App\Http\Models\Departamento;
use Illuminate\Database\QueryException;


class DepartamentosController extends Controller
{
    public function __contruct(){
        
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membros = Membros::all();

        $departamentos = Departamento::all();

        return view('formDepartamentos')->with('membros', $membros)->with('departamentos',$departamentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $dataForm = $request->all();

        Departamento::create($dataForm);

      
        return redirect()->back();
        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($t10_idDepartamento)
    {
        try{
        $departamento = Departamento::find($t10_idDepartamento);

        $departamento->delete();

        return redirect()->back();
        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);
        }

    }
}
