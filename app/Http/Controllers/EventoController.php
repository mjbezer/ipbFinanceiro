<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;
use App\Models\Membros;
use App\Models\Eventos;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class EventoController extends Controller
{
    public function __construct(Eventos $eventos, Membros $membros){
        $this->eventos=$eventos;
        $this->membros=$membros;
        $this->middleware('auth');

    }

    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $dataForm =$request->all();
            
            $t03_idMembro = $request->t03_idMembro;
            $insert = $this->eventos->create($dataForm);

            if($request->t05_nome == "Inativo" || $request->t05_nome == "Rol Separado" ){
           
                $membro = $this->membros->find($t03_idMembro);
                $membro->t03_situacao = $request->t05_nome;
                $update = $membro->save();
            
                return redirect()->route('membro.show',compact('t03_idMembro'));

            }
        }catch(\Exception $e){

                $mensagem = $e->getMessage();
                return redirect()->route('membro.show',compact('t03_idMembro'))->with('mensagem', $mensagem);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($t03_idMembro)
    {
        $titleModule = "Perfil do membro nº $t03_idMembro";
        $dadosMembro = DB::table('membros')
        ->join('status','status.t04_idStatus','=','membros.t04_idStatus')
        ->select('membros.*','status.*')
        ->where('membros.t03_idMembro','=',$t03_idMembro)
        ->get();

        $feeds = DB::table('historico')
        ->join('membros','membros.t03_idMembro','=','historico.t03_idMembro')
        ->select('historico.*')
        ->where('historico.t03_idMembro','=',$t03_idMembro)
        ->get();      

         return view("perfilMembro", compact('dadosMembro','titleModule','feeds'));
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
    public function destroy($t05_idHistorico)
    {
        try{
            $membresia = $this->eventos->find($t05_idHistorico);
            $delete =  $membresia->delete();
      
                          
                return redirect()->back();  
    
            }catch(\Exception $e){
    
               $mensagem = $e->getmessage();
               
               
                return redirect()->back()->with('mensagem',$mensagem);  
                      
    
            }
        
        
    }
}
