<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Banco;
use App\Http\Models\Conta;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;




class ContasController extends Controller
{

    public function __contruct(){
        
        $this->middleware('auth');
    }
    
    public function index()
    {
        $contas =  Conta::all();
                  
        return view('listContas')->with('contas', $contas);
    }
    
    public function create()
    {
         $bancos = Banco::all();

         return view('formContas')->with('bancos',$bancos);
    }

    
    public function store(Request $request)
    {
        try{
        $dataForm = $request->all();
        $dataForm['t07_saldoInicial'] = str_replace(',','.',str_replace('.','',$dataForm['t07_saldoInicial']));
        Conta::create($dataForm);

        return redirect()->route('contas.list');
        }catch(\Exeption $e){
            
            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);
        }

    }

    
    public function show($id)
    {
    }

    public function edit($t07_idContaBancaria)
    {
        $conta =  Conta::find($t07_idContaBancaria);
        $bancos = Banco::all();
        return view('formContas')->with('bancos',$bancos)->with('conta', $conta);

    }

   
    public function update(Request $request, $t07_idContaBancaria)
    {
        try{
        $dataForm = $request->all();
        $dataForm['t07_saldoInicial'] = str_replace(',','.',str_replace('.','',$dataForm['t07_saldoInicial']));
        $conta = Conta::find($t07_idContaBancaria);
        Conta::update($dataForm); 
        return redirect('/contas/list')->with('mensagem',$mensagem);

        }catch(\Exeption $e){
                
            $mensagem = $e->getmessage();
            
            return redirect()->back()->with('mensagem',$mensagem);

        }
        
    
    }

   
    public function destroy($t07_idContaBancaria)
    {
        try{
        $conta = Conta::find($t07_idContaBancaria);

            if($conta->t07_saldoInicial == 0 ){

                $conta->delete();

                $mensagem  =  "Conta Excluida com sucesso!"; 
                return redirect('/contas/list')->with('mensagem',$mensagem);

            } else{

                $mensagem  =  "Conta não pode ser excluida seu Saldo é diferente de 0 (zero)!"; 
                return redirect('/contas/list')->with('mensagem',$mensagem)->with('conta',$conta);
            }
        
        }catch(\Exeption $e){
                
            $mensagem = $e->getmessage();
            
            return redirect()->back()->with('mensagem',$mensagem);

        }
 
    }
}
