@extends('layouts.template')

@section('content')

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Fornecedores</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Novo Tipo de Fornecedor</strong>
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
                    <h5>Cadastro de Tipo de Fornecedor </h5>

                </div>
                <div class="ibox-content">
                   
                    <form method="post" action="/fornecedor/tipo/store" class="form-horizontal">
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t09_nome">Fornecedor Tipo</label>
                            <div class="col-sm-6">
                            <input type="text" name="t09_nome" id="t09_nome" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t09_descricao">Descrição</label>
                            <div class="col-sm-8">
                                <textarea name="t04_descricao" id="t09_descricao" class="form-control" ></textarea>
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
