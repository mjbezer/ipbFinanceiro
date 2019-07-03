<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Fornecedor;
use App\Http\Models\CategoriaFornecedor;
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
        $categoriaFornecedores = CategoriaFornecedor::all();
        return view('formFornecedor')->with('categoriaFornecedores',$categoriaFornecedores);
    }

    
    public function store(Request $request)
    {
        try{
        $dataForm = $request->all();

        Fornecedor::create($dataForm);

        return redirect('fornecedores/list');

        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);}

    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($t08_idFornecedor)
    {
        $fornecedor  = Fornecedor::find($t08_idFornecedor);
        $categoriaFornecedores = CategoriaFornecedor::all();
        return view('formFornecedor')->with('categoriaFornecedores',$categoriaFornecedores)
                                      ->with('fornecedor', $fornecedor);
    }

    
    public function update(Request $request, $t08_idFornecedor)
    {
        $dataForm = $request->all();
        $fornecedor = Fornecedor::find($t08_idFornecedor);
        $update =  $fornecedor->update($dataForm);

        if($update){
            return redirect('fornecedores/list');
        }else{
            return redirect('fornecedores/edit/$t03_idMembro')->with(['errors'=>'Falha ao editar Registro']);
        }
      
    }

   
    public function destroy($t08_idFornecedor)
    {
        $fornecedor= Fornecedor::find($t08_idFornecedor);
        $fornecedor->t08_situacao = 'Inativo';
        $update = $fornecedor->save();

        if($update){
            return redirect('/fornecedores/list');
        }else{
            return redirect('/fornecedores/list/$t08_idFornecedor')->with(['errors'=>'Falha ao inativar o membro!']);

        }
    }

    
    public function createTipo()
    {
        $tipoFornecedores = CategoriaFornecedor::all();
    
        return view('formTipoFornecedor')->with('tipoFornecedores', $tipoFornecedores);
    }

    public function storeTipo(Request $request)
    {
        try{
        $dataForm = $request->all();

            
        CategoriaFornecedor::create($dataForm);

        return redirect()->back();

        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->back()->with('mensagem',$mensagem);}


    }
    public function destroyTipo($t09_idCategoriaFornecedores){

        try{
            
            $categoriaFornecedor = CategoriaFornecedor::find($t09_idCategoriaFornecedores);
            $categoriaFornecedor->delete();
            
            return redirect()->back();

        }catch(\Exception $e){

            $mensagem = $e->getmessage();
            
            
             return redirect()->back()->with('mensagem',$mensagem); 
        }
    }
}
