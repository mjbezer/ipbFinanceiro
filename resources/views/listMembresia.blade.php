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
                       <h4 class="modal-title">Exclusão de Registro Membresia</h4>
                      
                 </div>
                 <div class="modal-body">
                       <div class="text-center">
                            <p><span class="text-danger">Erro na exclusão do registro, favor consultar administrador do Sistema</p>

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
        <h2>Membresia</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Lista de Status</strong>
            </li>
        </ol>
    </div>

</div>
<!-- Inicio da listagem de status de membresia-->
                    <div class="wrapper wrapper-content animated fadeInUp">
    
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Lista de Status da Membresia</h5>
                                <div class="ibox-tools">
                                <a href="{{route('membresia.create')}}" class="btn btn-primary btn-xs">Criar Novo Status</a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="project-list">
    
                                    <table class="table table-hover">
                                        <tbody>
                                               @foreach($membresia as $value)
                                                   
                                            <tr>
                                            <td class="project-status">
                                                <span class="label label-warning">{{$value->t04_idStatus}}</span>
                                            </td>
                                            <td class="project-title">
                                                <a href="project_detail.html">{{$value->t04_nome}}</a>
                                                <br>
                                                <small>{{$value->t04_descricao}}</small>
                                            </td>
                                            <td class="project-completion">
                                                    <span>{{$value->t04_secao}}</span>
                                                </td>
                                            <!--<td class="project-completion">
                                                    <small>corresponde a 10% do total de membros</small>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 10%;" class="progress-bar"></div>
                                                    </div>
                                            </td>-->
                                           
                                            <td class="project-actions">
                                            <a href="{{route('membresia.edit',$value->t04_idStatus)}}" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-pencil"></i> Editar </a>
                                            <button class="btn btn-outline btn-danger btn-sm" data-toggle="modal" data-target="#modalExclusao{{$value->t04_idStatus}}"><i class="fa fa-times"></i> Excluir </button>
                                        </td>
                                        </tr>

                                                 <!--Modal  de Exlusão -->


                                                 <div class="modal inmodal" id="modalExclusao{{$value->t04_idStatus}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <div class="modal-content animated fadeIn">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <i class="fa fa-warning fa-4x text-danger"></i>
                                                                <h4 class="modal-title">Exclusão de Registro Membresia</h4>
                                                            <p>Ao confirmar essa operação, o status <strong>{{$value->t04_nome}}</strong> será   <strong class="text-danger"> EXCLUIDO </strong>do banco de dados.</p>
                                                            <p class="text-danger">Certifique-se que não há algum membro associado a esse Status!</p>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h2>Deseja EXCLUIR o Status de Membresia <p><span class="text-danger">{{$value->t04_nome}}</span> ?</p></h2>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                                <a href="{{route('membresia.destroy',$value->t04_idStatus)}}" type="button" class="btn btn-danger">Excluir</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                            </div>
                                                 @endforeach
                                               
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection

@push('js')
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

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
@endpush