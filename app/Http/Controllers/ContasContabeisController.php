<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ContaContabil;
use Illuminate\Database\QueryException;

class ContasContabeisController extends Controller
{
    public function __construct(){
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
        $contasContabeis = ContaContabil::all();
        
        return view('formContasContabeis')->with('contasContabeis', $contasContabeis);
    
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
       
        ContaContabil::create($dataForm);

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
    public function edit($t13_idContaContabil)
    {

        $contasContabeis = ContaContabil::all();
        $contaContabilEdit = ContaContabil::find($t13_idContaContabil);

               
        return view('formContasContabeis')->with('contasContabeis', $contasContabeis)
                                          ->with('contaContabilEdit', $contaContabilEdit);
    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $t13_idContaContabil)
    {
        $dataForm = $request->all();
        $contaContabil = ContaContabil::find($t13_idContaContabil);

        try{

            $contaContabil->update($dataForm);

            return redirect('/contaContabil/create');
        }catch(\Exeption $e){
            
            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($t13_idContaCotabil)
    {
        try{
        $contaContabil = ContaContabil::find($t13_idContaCotabil);

        $contaContabil->delete();

        return redirect()->back();
        }catch(\Exeption $e){
            
            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);
        }
    }
}
