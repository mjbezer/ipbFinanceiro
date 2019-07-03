@extends('layouts.template')

@push('css')

<link rel="stylesheet" href="{{ asset('css/plugins/footable/footable.core.css') }}">

@endpush
@section('content')




<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Membros</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Lista Geral de Membros</strong>
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
                    <h2>Lista Geral de Membros da IPJT </h2>

                    <div class="input-group">
                        <input type="text" class="form-control input-sm m-b-xs" id="filter" placeholder="Busca Membro">

                        <span class="input-group-btn">
                            <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i>
                                Pesquisar</button>
                        </span>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
            <div class="ibox-content">
                   
                            <table class="footable table table-stripped table-hover" data-page-size="20"   data-filter=#filter>
                                <thead>
                                    <th >Status</th>
                                    <th ></th>
                                    <th><a href="#"> Nome </a></th>
                                    <th >Celular</th>
                                    <th >E-mail</th>

                                    <th class="celcenter"><a href="{{route('membro.create')}}"
                                            class="btn btn-outline btn-primary btn-sm"><i
                                                class="fa fa-plus-square-o"></i> Novo Membro</a></th>

                                </thead>

                                <tbody>
                                    @foreach ($membros as $membro)

                                    <tr>

                                        <td class="client-status"><span class="label 
                                                            @if($membro->t03_situacao == 'Ativo')
                                                            label-primary
                                                            @elseif($membro->t03_situacao == 'Inativo')
                                                            label-danger
                                                            @else
                                                            label-warning
                                                            @endif
                                                            
                                                            ">{{$membro->t03_situacao}}</span></td>
                                        <td class="client-avatar"><img alt="image"
                                                src="img/profile_small.jpg"> </td>
                                        <td><a href="/membro/{{$membro->t03_idMembro}}/show "
                                                class="client-link">{{$membro->t03_nome}}</a></td>

                                        <td><i class="fa fa-phone"> </i> {{$membro->t03_foneCelular}}
                                        </td>

                                        <td><i class="fa fa-envelope"> </i> {{$membro->t03_email}}</td>
                                       

                                        <td class="project-actions">
                                            @if($membro->t03_situacao =="ativo")
                                            <a href="{{route('membro.edit',$membro->t03_idMembro)}}"
                                                class="btn btn-outline btn-info btn-xs">
                                                <i class="fa fa-pencil"></i> Editar </a>
                                            <button class="btn btn-outline btn-danger btn-xs"
                                                data-toggle="modal"
                                                data-target="#modalExclusao{{$membro->t03_idMembro}}"><i
                                                    class="fa fa-times"></i> Excluir </button>
                                            @else
                                            <button class="btn btn-outline btn-success btn-xs"
                                                data-toggle="modal"
                                                data-target="#modalReativacao{{$membro->t03_idMembro}}"><i
                                                    class="fa fa-times"></i> Reativar </button>
                                            @endif
                                        </td>
                                    </tr>
                                   

                        </div>
                         <!--Modal  de Exlusão -->
                         <div class="modal inmodal"
                         id="modalExclusao{{$membro->t03_idMembro}}" tabindex="-1"
                         role="dialog" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content animated fadeIn">
                                 <div class="modal-header">
                                     <button type="button" class="close"
                                         data-dismiss="modal"><span
                                             aria-hidden="true">&times;</span><span
                                             class="sr-only">Close</span></button>
                                     <i class="fa fa-warning fa-4x text-danger"></i>
                                     <h4 class="modal-title">Membro Inativo</h4>
                                     <p>Ao confirmar essa operação, o membro
                                         <strong>{{$membro->t03_nome}}</strong> tornará
                                         inativo e passará para : <strong
                                             class="text-danger">ROL SEPARADO</strong>
                                     </p>
                                 </div>
                                 <div class="modal-body">
                                     <div class="text-center">
                                         <img src="img/profile_small.jpg"
                                             class="img-circle circle-border m-b-md"
                                             alt="profile">
                                         <h2>Deseja tornar inativo o membro <p><span
                                                     class="text-danger">{{$membro->t03_nome}}</span>
                                                 ?</p>
                                         </h2>
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-white"
                                         data-dismiss="modal">Cancelar</button>
                                     <a href="{{route('membro.destroy',['t03_idMembro'=>$membro->t03_idMembro,'t03_situacao'=>'Rol Separado'])}}"
                                         type="button"
                                         class="btn btn-danger">Inativar</a>
                                 </div>
                             </div>
                         </div>
                        </div>

                        <!--Modal  de Reativação -->
                        <div class="modal inmodal" id="modalReativacao{{$membro->t03_idMembro}}"
                            tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated fadeIn">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span
                                                aria-hidden="true">&times;</span><span
                                                class="sr-only">Close</span></button>
                                        <i class="fa fa-warning fa-4x text-navy"></i>
                                        <h4 class="modal-title">Reativação de Membro</h4>
                                        <p>Ao confirmar essa operação, o membro
                                            <strong>{{$membro->t03_nome}}</strong> tornará ao Status de
                                            Ativo e passará para : <strong class="text-navy">MEMBRO
                                                ATIVO</strong> </p>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="img/profile_small.jpg"
                                                class="img-circle circle-border m-b-md" alt="profile">
                                            <h2>Deseja Reativar o membro <p><span
                                                        class="text-navy">{{$membro->t03_nome}}</span> ?
                                                </p>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white"
                                            data-dismiss="modal">Cancelar</button>
                                        <a href="{{route('membro.destroy',['t03_idMembro'=>$membro->t03_idMembro,'t03_sitiuacaoã'=> 'Ativo'])}}"
                                            type="button" class="btn btn-primary">Reativar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <tfoot>
                            <tr>
                                <td colspan="6  ">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>



                    </table>
                   
                </div>
                
            </div>
        </div>
     </div>
</div>






@endsection

@push('js')
<script src="{{ asset('js/plugins/footable/footable.all.min.js')}}"></script>

<script>
    $(document).ready(function () {

        $('.footable').footable();

    });

</script>




@endpush