<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Fornecedor;
use App\Http\Models\TipoFornecedor;
use Illuminate\Database\QueryException;


class FornecedorController extends Controller
{
    public function __contruct(){
        
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        $fornecedores = Fornecedor::all();

        return view('listFornecedores')->with('fornecedores', $fornecedores);

    }

   
    public function create()
    {
        return view('formFornecedor');
    }

    
    public function store(Request $request)
    {
        try{
        $dataForm = $request->all();
        Fornecedor::create($dataForm);

        return redirect()->index();

        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);}

    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }

    
    public function createTipo()
    {
        $tipoFornecedor = TipoFornecedor::all();
        return view('formTipoFornecedor')->with('tipoFornecedor', $tipoFornecedor);
    }

    public function storeTipo(Request $request)
    {
        try{
        $dataForm = $request->all();
        TipoFornecedor::create($dataForm);

        return redirect()->createTipo();

        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);}


    }
}
