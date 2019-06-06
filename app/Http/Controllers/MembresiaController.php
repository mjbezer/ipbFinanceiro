<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Http\Requests\MembresiaFormRequest;

class MembresiaController extends Controller
{
    public function __construct(Membresia $membresia){
        $this->membresia=$membresia;
        $this->middleware('auth');

    }

    public function index()
    {
        $membresia = Membresia::all();
         return view('listMembresia', compact('membresia'));

        

    }

    
    public function create()
    {
        return view("formMembresia");
    }

    
    public function store(MembresiaFormRequest $request){
        $dataForm =$request->all();
        $insert = $this->membresia->create($dataForm);
        return redirect()->route('membresia.index');
   }

    
    public function show($id)
    {
        
    }

    
    public function edit($t04_idStatus)
    {
        $membresia = DB::table('status')
        ->where('status.t04_idStatus', '=' ,$t04_idStatus)
        ->select('status.*')
        ->get();

        return view('formMembresia', compact('membresia'));
    }

    
    public function update(MembresiaFormRequest $request, $t04_idStatus) {
        try{
        $dataForm = $request->all();
        $membresia = $this->membresia->find($t04_idStatus);
        $update =  $membresia->update($dataForm);

        $mensagem = "Status ".$membresia->t04_nome." alterado com sucesso!!!";

            return redirect()->route('membresia.index')->with('mensagem',$mensagem);
        }catch(\Exeption $e){

            $mensagem = $e->getmessage();

            return redirect()->route('membresia.edit',$t04_idStatus)->with('mensagem',$mensagem);
        }
    }
   
    public function destroy($t04_idStatus)
    {
       

        try{
        $membresia = $this->membresia->find($t04_idStatus);
        $delete =  $membresia->delete();
        $t04_nome = $membresia->t04_nome;
        

       
            $mensagem = 'Status excluido com sucesso!';
            return redirect()->back()->with('mensagem',$mensagem);  

        }catch(\Exception $e){

           $mensagem = $e->getmessage();
           
           
            return redirect()->back()->with('mensagem',$mensagem);  
                  

        }
    }
}
