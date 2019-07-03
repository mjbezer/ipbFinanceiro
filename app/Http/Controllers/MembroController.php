<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;
use App\Models\Membros;
use App\Models\Eventos;
use App\Http\Requests\MembrosFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class MembroController extends Controller
{
   
    public function __construct(Membros $membros){
        $this->membros=$membros;
        $this->middleware('auth');

    }
// Metodo inicial do controller ( listagem geral dos membros)
    public function index() {
        $membros = DB::table('membros')
        ->join('status','status.t04_idStatus','=','membros.t04_idStatus')
        ->select('membros.*','status.*')
        ->get();
        
        return view('listMembros', compact('membros'));
    }

   //metodo create (chama form de cadastro de membro)
    public function create(){

        $membresia = Membresia::all();
        return view("formMembro", compact('membresia'));

    }  

    //método de validação e cadastro de membro 
     public function store(MembrosFormRequest $request){

            $dataForm =$request->all();
            $insert = $this->membros->create($dataForm);
            return redirect()->route('membro.index');

      }
    
    public function aniver()
    {
     echo "q esquisiti...";
    }

    public function show($t03_idMembro)
    {
     // esse método esta sendo executado no Controller de Eventos 
    }

   
    public function edit($t03_idMembro){
        $membresia = Membresia::all();

        $membro = DB::table('membros')
        ->join('status','status.t04_idStatus','=','membros.t04_idStatus')
        ->where('membros.t03_idMembro','=',$t03_idMembro)
        ->select('membros.*','status.*')
        ->get();
        
             foreach($membro as $dates){
                    $datas = ['t03_dtNascimento'=>date('Y-m-d',strtotime($dates->t03_dtNascimento)),
                            't03_dtCasamento' => date('Y-m-d',strtotime($dates->t03_dtCasamento))
                            ];
           }        
         return view("formMembro", compact('membro','membresia','datas'));


    }

   //método de alteração de registro
    public function update(MembrosFormRequest $request, $t03_idMembro){

        $dataForm = $request->all();
        $membro = $this->membros->find($t03_idMembro);
        $update =  $membro->update($dataForm);

        if($update){
            return redirect()->route('membro.index');
        }else{
            return redirect()->route('membro.edit',$t03_idMembro)->with(['errors'=>'Falha ao editar Registro']);
        }
    }


    public function destroy($t03_idMembro,$t03_situacao)
    {
        $membro = $this->membros->find($t03_idMembro);
        $membro->t03_situacao = $t03_situacao;
        $update = $membro->save();

        if($update){
            return redirect()->route('membro.index');
        }else{
            return redirect()->route('membro.index',$t03_idMembro)->with(['errors'=>'Falha ao inativar o membro!']);

        }
    }


    public function api(){

       $membros = Membros::all();

       return json($membros);
    }

  
}
