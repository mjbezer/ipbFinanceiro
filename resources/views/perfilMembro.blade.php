@extends('layouts.template')

@section('content')

@if(session('mensagem'))
       
    <section class="error-message">
    <div class="modal inmodal modal-show"  tabindex="-1" role="dialog"  aria-hidden="true" style="background-color:rgba(0,0,0,0.5);" >
        <div class="modal-dialog modal-md">
             <div class="modal-content animated fadeIn">
                 <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       <i class="fa fa-warning fa-4x text-danger"></i>
                       <h4 class="modal-title">Exclusão de Evento   </h4>
                      
                 </div>
                 <div class="modal-body">
                       <div class="text-center">
                                        {{session('mensagem')}}
                         </div>
                 </div> 
                 <div class="modal-footer">
                       <button type="button" class="btn btn-white btn-close" data-dismiss="modal">Fechar</button>
                 </div>
             </div>
        </div>
    </div>
</section>                               
                                            
@endif


<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Membros</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>{{$titleModule}}</strong>
            </li>
        </ol>
    </div>

</div>
<!-- Inicio do PERFIL de Membros-->
<div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-md-4">
                @foreach($dadosMembro as $value)
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Perfil do Membro</h5>
                    </div>
                    <div>
                        <div class="ibox-content ">
                            <img alt="image" class="img-circle" src="{{url('/img')}}/membros/profile_small.jpg">
                        </div>
                        <div class="ibox-content profile-content ">
                            
                                <span class="text-navy">
                                <h4>{{$value->t03_nome}}</h4>
                                </span>
                            <p><i class="fa fa-map-marker"></i> {{$value->t03_endereco}} - {{$value->t03_complemento}}</p>
                            <p> {{$value->t03_bairro}} - {{$value->t03_cep}}</p>
                            <p> {{$value->t03_cidade}}/{{$value->t03_UF}}</p>

                            <span class="text-navy"><h4>Sobre mim</h4>
                            </span>
                            <p>
                                    <strong>Nascimento :</strong>{{date( 'd/m/Y' , strtotime($value->t03_dtNascimento))}} 
                                </p>
                                <p>
                                        <strong>Natural de:</strong>{{$value->t03_naturalidade}} 
                                    </p>
                            
                            <p>
                                <strong>Estado Civíl :</strong>{{$value->t03_estadoCivil}} 
                            </p>
                            <p>
                                <strong>Conjugê :</strong>{{$value->t03_conjuge}} 
                            </p>
                            <p>
                               <strong>Nome do Pai :</strong>{{$value->t03_nomePai}} 
                            </p>
                            <p>
                                <strong>Nome da Mãe :</strong>{{$value->t03_nomeMae}} 
                            </p>
                            <span class="text-navy"><h4>Dados Eclesiasticos</h4></span>
                            <p>
                                    <strong>Membresia :</strong>{{$value->t04_nome}} 
                                </p>
                                <p>
                                    <strong>Dizimista :</strong>{{$value->t03_dizimista}} 
                                </p>
                                <p>
                                   <strong>Situação :<button type="button" class="btn btn-primary btn-xs">{{$value->t03_situacao}}</button> 
                                </p>

                            <div class="user-button">
                                <div class="row">
                                    <div class="col-md-6">
                                            <a href="#" class="btn btn-block btn-success btn-sm" ><i class="fa fa-clipboard"></i> Evento </a>
                                    </div>
                                    <div class="col-md-6">
                                            <a href="{{route('membro.edit',$value->t03_idMembro)}}" class="btn btn-block btn-info btn-sm"><i class="fa fa-pencil"></i> Editar </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
                </div>
                <div class="col-md-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Movimentação Eclesiástica</h5>
        
                            </div>
                            <div class="ibox-content">
        
        
                                <div>
                                    <form method="post" action="{{route('evento.store')}}" class="form-horizontal">
                                        {!!csrf_field() !!}
                                        <input type="hidden" name="t03_idMembro" value="{{$value->t03_idMembro}}">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="t05_nome">Evento</label>
                                            <div class="col-sm-6">
                                                    <select class="form-control m-b" name="t05_nome">
                                                            <option value="">Selecione</option>
                                                            <option value="Transferencia">Tranferência</option>
                                                            <option value="Disciplina">Disciplina</option>
                                                            <option value="Rol Separado">Rol Separado</option>
                                                            <option value="Inativo">Inativo</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="t05_descricao">Descrição</label>
                                            <div class="col-sm-8">
                                                <textarea name="t05_descricao" id="t05_descricao" class="form-control"></textarea>
                                            </div>
                                           
                    
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <button class="btn btn-white" type="reset">Cancelar</button>
                                                <button class="btn btn-primary" type="submit">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
              
                                    
                                </div>
                    
        
                            </div>
                        </div>
        
                    </div>

            <div class="col-md-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Histórico</h5>

                    </div>
                    <div class="ibox-content">


                 <div>
                        @foreach ($feeds as $feed)

                        <div class="social-feed-box">

                            <div class="pull-right social-action dropdown">
                                <button data-toggle="dropdown" class="dropdown-toggle btn-white" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu m-t-xs">
                                    <li><a href="#" data-toggle="modal" data-target="#modalExclusao{{$feed->t05_idHistorico}}">Excluir</a></li>
                                </ul>
                            </div>
                            <div class="social-avatar">
                                <a href="" class="pull-left">
                                    <img alt="image" src="{{url('/img')}}/membros/profile_small.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        {{$feed->t05_nome}}
                                    </a>
                                    <small class="text-muted">{{ date( 'd/m/Y' , strtotime($feed->created_at))}}</small>
                                </div>
                            </div>
                            <div class="social-body">
                                <p>
                                    {{$feed->t05_descricao}}
                                </p>
        
                               
                            </div>
                            
        
                        </div>
                                  <!--Modal  de Exlusão -->
                                      <div class="modal inmodal" id="modalExclusao{{$feed->t05_idHistorico}}"" tabindex="-1" role="dialog"  aria-hidden="true">
                                             <div class="modal-dialog modal-md">
                                                  <div class="modal-content animated fadeIn">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                    <i class="fa fa-warning fa-4x text-danger"></i>
                                                                         <h4 class="modal-title">Excluir Evento</h4>
                                                                             <p>Ao confirmar essa operação, o evento atribuido a <strong>{{$value->t03_nome}}</strong> será  <strong class="text-danger">EXCLUSO</strong>  do sistema</p>
                                                          </div>
                                                           <div class="modal-body">
                                                                       <div class="text-center">
                                                                              <img src="img/membros/{{$value->t03_idMembro}}.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                                                                   <h2>Deseja excluir evendo de  <p><span class="text-danger">{{$value->t03_nome}}</span> ?</p></h2>
                                                                        </div>
                                                            </div>
                                                             <div class="modal-footer">
                                                                     <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                                            <a href="{{route('evento.destroy', $feed->t05_idHistorico)}}" type="button" class="btn btn-danger">Excluir</a>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                            
                        @endforeach
                </div>
         
                        

                    </div>
                </div>

            </div>
           
    </div>
@endsection

