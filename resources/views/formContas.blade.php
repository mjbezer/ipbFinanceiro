@extends('layouts.template')

@section('content')

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Bancos</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Nova Conta Bancária</strong>
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
                    <h5>Cadastro de Nova Conta Bancária </h5>

                </div>
                <div class="ibox-content">
                    @if(isset($conta))
                                <form method="post" action="/contas/update/{{$conta->t07_idContaBancaria}}" class="form-horizontal">
                                {!! method_field('PUT')!!}

                    @else
                    <form method="post" action="/contas/store" class="form-horizontal">
                    @endif
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t07_tipoConta">Tipo da Conta</label>
                            <div class="col-sm-4">
                                <Select name="t07_tipoConta" id="t07_tipoConta" class="form-control">
                                    <option value="">Selecione</option>
                                    @isset($conta)
                                    <option value="{{$conta->t07_tipoConta}}" selected>{{$conta->t07_tipoConta}}</option>
                                    @endisset
                                    <option value="Poupança">Poupança</option>
                                    <option value="Conta Corrente">Conta Corrente</option>
                                    <option value="Aplicação">Aplicação</option>
                                 </Select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t06_idBanco">Banco</label>
                            <div class="col-sm-4">
                                <Select name="t06_idBanco" id="t06_idBanco" class="form-control">
                                    <option value="">Selecione</option>
                                    @isset($conta)
                                     <option value="{{$conta->t06_idBanco}}" selected>{{$conta->bancos->t06_nome}}</option>
                                    @endisset
                                    @foreach ($bancos as $banco)
                                        <option value="{{$banco->t06_idBanco}}">{{$banco->t06_nome}}</option>
                                    @endforeach
                                 </Select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t07_agencia">Agência</label>
                            <div class="col-sm-3">
                            <input type="text" name="t07_agencia" id="t07_agencia" class="form-control" value="{{$conta->t07_agencia or old('t07_agencia')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t07_conta">Conta</label>
                            <div class="col-sm-3">
                            <input type="text" name="t07_conta" id="t07_conta" class="form-control" value="{{$conta->t07_conta or old('t04_conta')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t07_saldoInicial">Saldo Inicial</label>
                            <div class="col-sm-4">
                                <input name="t07_saldoInicial" id="t07_saldoInicial" class="form-control" onKeyPress="return(moeda(this,'.',',',event))" value="{{$conta->t07_saldoInicial or old('t07_saldoInicial')}}">
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
<script language="javascript">   
        function moeda(a, e, r, t) {
            let n = ""
              , h = j = 0
              , u = tamanho2 = 0
              , l = ajd2 = ""
              , o = window.Event ? t.which : t.keyCode;
            if (13 == o || 8 == o)
                return !0;
            if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
                return !1;
            for (u = a.value.length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
                ;
            for (l = ""; h < u; h++)
                -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
            if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "0" + r + "0" + l),
            2 == u && (a.value = "0" + r + l),
            u > 2) {
                for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                    3 == j && (ajd2 += e,
                    j = 0),
                    ajd2 += l.charAt(h),
                    j++;
                for (a.value = "",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                    a.value += ajd2.charAt(h);
                a.value += r + l.substr(u - 2, u)
            }
            return !1
        }
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
