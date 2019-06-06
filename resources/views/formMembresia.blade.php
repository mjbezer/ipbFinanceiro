@extends('layouts.template')

@section('content')

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Membresia</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Novo Status de Membresia</strong>
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
                    <h5>Cadastro de Status de Membresia </h5>

                </div>
                <div class="ibox-content">
                    @if(isset($membresia))
                        @foreach($membresia as $value)
                                <form method="post" action="{{route('membresia.update',$value->t04_idStatus)}}" class="form-horizontal">
                                {!! method_field('PUT')!!}

                                </label>
                         @endforeach
                    @else
                    <form method="post" action="{{route('membresia.store')}}" class="form-horizontal">
                    @endif
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t04_nome">Status</label>
                            <div class="col-sm-6">
                            <input type="text" name="t04_nome" id="t04_nome" class="form-control" value="{{$value->t04_nome or old('t04_nome')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t04_descricao">Descrição</label>
                            <div class="col-sm-8">
                                <textarea name="t04_descricao" id="t04_descricao" class="form-control" >{{$value->t04_descricao or old('t04_descricao')}}</textarea>
                            </div>
                           

                        </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="t04_secao">Seção</label>
                                <div class="col-sm-8">
                                    <Select name="t04_secao" id="t04_secao" class="form-control">
                                        <option value="">Selecione</option>
                                        @if(isset($membresia))
                                        <option value="{{$value->t04_secao}}" selected>{{$value->t04_secao}}</option>
                                        @endif
                                        <option value="Admissão">Admissão</option>
                                        <option value="Transferência">Transferência</option>
                                        <option value="Demissão">Demissão</option>
                                        
                                        
                                        
                                    </Select>
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
