@extends('layouts.template')

@section('content')

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Contas Contabeis</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Nova Conta Contábil</strong>
            </li>
        </ol>
    </div>

</div>


<!-- modal de validação-->

@if( isset($errors) && count($errors) > 0 )
<section class="error-message">
        <div class="modal inmodal modal-show" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true"  style="background-color:rgba(0,0,0,0.5);" >
            <div class="modal-dialog modal-md">
            <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-warning fa-4x text-warning"></i>
                        <h4 class="modal-title">Erro na Validação dos Dados</h4>
                        <small class="font-bold">Verifique na lista abaixo qual campo não foi aceito pelo banco de dados!.</small>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                             @foreach($errors->all() as $error)
                               <div class="col-md-12">
                                    <i class="fa fa-circle text-danger"></i>
                                
                                   {{$error}}
                                </div>
                         @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white btn-close" name="btn-close" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Inicio do Form de Membros-->
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row a">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cadastro de Conta Contábil </h5>

                </div>
                <div class="ibox-content">
                    @if(isset($contaContabilEdit))
                                <form method="post" action="/contaContabil/update/{{$contaContabilEdit->t13_idContaContabil}}" class="form-horizontal">
                                {!! method_field('PUT')!!}
                                    {{$contaContabilEdit->t13_nome}}
                    @else
                    <form method="post" action="/contaContabil/store" class="form-horizontal">
                    @endif
                        {!!csrf_field() !!}
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t13_tipo">Categoria de Conta Contábil</label>
                            <div class="col-sm-3">
                                <Select name='t13_tipo' id="t13_tipo" class="form-control">
                                    <Option>Selecione</Option>
                                    @if(isset($contaContabilEdit))
                                    <option selected value="{{$contaContabilEdit->t13_tipo}}" >{{$contaContabilEdit->t13_tipo}}</option>
                                    @endif
                                    <option value="Receita"> Receita</option>
                                    <option value="Despesas">Despesas</option>
                                </Select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t13_nome">Conta Contabil</label>
                            <div class="col-sm-3">
                            <input type="text" name="t13_nome" id="t13_nome" class="form-control" value="{{$contaContabilEdit->t13_nome or old('t13_nome')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t13_descricao">Descrição</label>
                            <div class="col-sm-8">
                            <textarea type="text" name="t13_descricao" id="t13_descricao" class="form-control" value="{{$contaContabilEdit->t13_descricao or old('t13_descricao')}}">{{$contaContabilEdit->t13_descricao or old('t13_descricao')}}</textarea>
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
    <div class="row a">
        <div class="col-lg-12">

            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Conta Contabil</th>
                            <th>Categoria</th>
                            <th>Descrição</th>
                            <th></th>

                        </thead>                            
                        <tbody>
                            @foreach($contasContabeis as $contaContabil)
                            <tr>
                                <td>{{$contaContabil->t13_nome}}</a></td>
                                <td> {{$contaContabil->t13_tipo}}</td>
                                <td> {{$contaContabil->t13_descricao}}</td>
                            <td><a href="/contaContabil/edit/{{$contaContabil->t13_idContaContabil}}"><button class="btn btn-outline btn-warning btn-sm">Editar</button></a>
                            <span class="btn btn-outline btn-danger btn-sm" data-toggle="modal" data-target="#modalExclusao{{$contaContabil->t13_idContaContabil}}">Excluir</span></td>
                            </tr>
                            
                            <div class="modal inmodal" id="modalExclusao{{$contaContabil->t13_idContaContabil}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content animated fadeIn">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <i class="fa fa-warning fa-4x text-danger"></i>
                                                <h4 class="modal-title">Exclusão de contas contábeis</h4>
                                            <p>Ao confirmar essa operação, a conta contabil será  <strong class="text-danger">EXCLUIDA!</strong> </p>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <p>Deseja excluir a conta contábil <span class="text-danger">{{$contaContabil->t13_nome}}?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                                                <a href="/contaContabil/destroy/{{$contaContabil->t13_idContaContabil}}" type="button" class="btn btn-danger">Excluir</a>
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
</div>

@endsection

@push('js')
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>


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
