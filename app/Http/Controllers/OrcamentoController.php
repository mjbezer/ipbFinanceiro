<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Orcamento;
use App\Http\Models\Departamento;

class OrcamentoController extends Controller
{
    public function __contruct(){
        
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos =  Departamento::all();

        return view('formOrcamento')->with('departamentos', $departamentos);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $dataForm = $request->all();

        $dataForm = $request->all();
        $dataForm['t11_valor'] = str_replace(',','.',str_replace('.','',$dataForm['t11_valor']));


        $verify = Orcamento::firstOrNew(['t10_idDepartamento'=>$dataForm['t10_idDepartamento'],
                                             't11_exercicio'=>$dataForm['t11_exercicio']]);

        if ($verify->exists == true){
            
            $message = "Erro ao incluir a provisão orçamentária, PREVISÃO JÁ CASTRADA!"; 

            return redirect('/orcamento/create')->with('message', $message);

        }else{
            
            Orcamento::create($dataForm);
            
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
    public function destroy($id)
    {
        //
    }

}
