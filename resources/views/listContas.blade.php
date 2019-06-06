@extends('layouts.template')

@push('css')

<link rel="stylesheet" href="{{ asset('css/plugins/datapicker/datepicker3.css') }}">

@endpush
@section('content')
@if(session('mensagem'))
       
    <section class="error-message">
    <div class="modal inmodal modal-show"  tabindex="-1" role="dialog"  aria-hidden="true" style="background-color:rgba(0,0,0,0.5);" >
        <div class="modal-dialog modal-md">
             <div class="modal-content animated fadeIn">
                 <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       <i class="fa fa-warning fa-4x text-danger"></i>
                       <h4 class="modal-title">Exclusão de Conta Bancária</h4>
                      
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
        <h2>Bancos</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Lista Geral de Bancos</strong>
            </li>
        </ol>
    </div>

</div>
<!-- Inicio da listagem de status de membresia-->
                    <div class="wrapper wrapper-content animated fadeInUp">
    
                            <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox">
                                            <div class="ibox-content">
                                                <h2>Lista Geral de Contas </h2>
                                               
    
                                                <div class="clients-list">
                                                
                                                <div class="tab-content">
                                                    <div id="tab-1" class="tab-pane active">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-hover">
                                                                    <thead>
                                                                        <th>Banco</th>
                                                                        <th>Tipo da Conta</th>
                                                                        <th>Agencia</th>
                                                                        <th>Conta</th>
                                                                        <th>Saldo</th>

                                                                        <th class="celcenter"><a href="/contas/create" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-plus-square-o"></i> Nova Conta</a></th>

                                                                    </thead>
                                                                    
                                                                    <tbody>
                                                                    @foreach ($contas as $conta)
                                                                        
                                                                    <tr>
                                                                       
                                                                        
                                                                        <td> </i> {{$conta->bancos->t06_nome}}</td>

                                                                        <td> {{$conta->t07_tipoConta}}</td>
                                                                    <td>{{$conta->t07_agencia}} </td>
                                                                    <td>{{$conta->t07_conta}} </td>
                                                                    <td> R$ {{number_format($conta->t07_saldoInicial,2,',','.')}} </td>



                                                                        <td class="project-actions">
                                                                              
                                                                                <a href="/contas/edit/{{$conta->t07_idContaBancaria}}" class="btn btn-outline btn-info btn-sm">
                                                                                    <i class="fa fa-pencil"></i> Editar </a>
                                                                                  <button class="btn btn-outline btn-danger btn-sm" data-toggle="modal" data-target="#modalExclusao{{$conta->t07_idContaBancaria}}"><i class="fa fa-times"></i> Excluir </button>
                                                                                
                                                                                
                                                                            </td>
                                                                    </tr>
                                                                             <!--Modal  de Exlusão -->


                                                                        <div class="modal inmodal" id="modalExclusao{{$conta->t07_idContaBancaria}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content animated fadeIn">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                                            <i class="fa fa-warning fa-4x text-danger"></i>
                                                                                            <h4 class="modal-title">Exclusão de Conta</h4>
                                                                                        <p>Ao confirmar essa operação, a conta será  <strong class="text-danger">EXCLUIDA!</strong> </p>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="text-center">
                                                                                                <p>Deseja excluir a conta tipo  <span class="text-danger">{{$conta->t07_tipoConta}}</p>
                                                                                                <p>{{$conta->bancos->t06_nome}}</p>
                                                                                                <p>Agencia :{{$conta->t07_agencia}}  - Conta :{{$conta->t07_conta}} </p>

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                                                            <a href="/contas/destroy/{{$conta->t07_idContaBancaria}}" type="button" class="btn btn-danger">Excluir</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                
                                                                        </div>



                                                                        
                                                            
                                                                    </div>
                                                                    @endforeach
                                                                    
                                                                     </tbody>
                                                                </table>
                                                            </div>
                                                        </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                                    </div>
                    
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                           

   
   


@endsection

@push('js')
<script src="   js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script>
        let message = document.querySelector('.error-message');
        let close = document.querySelector('.close');
        let btnClose = document.querySelector('.btn-close');
        
        
        close.onclick=function(){
            message.style.display = "none";
        }
        btnClose.onclick=function(){
            message.style.display = "none";
        }
    </script>
<script>
    $('#data_1 .input-group.date').datepicker({
        language: "pt-BR",
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: false,
        autoclose: true

    });

   
</script>


@endpush