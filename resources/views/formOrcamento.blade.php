@extends('layouts.template')

@section('content')

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Orçamento</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Previsão Orçamentária Anual</strong>
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
@if(isset($message))
{{$message}}
<section class="error-message">
        <div class="modal inmodal modal-show" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true"  style="background-color:rgba(0,0,0,0.5);" >
            <div class="modal-dialog modal-md">
            <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-warning fa-4x text-warning"></i>
                        <h4 class="modal-title">Erro no Inclução da Previsão Orçamentária </h4>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                               <div class="col-md-12">
                                    <i class="fa fa-circle text-danger"></i>
                                    {{ session('message') }}
                                </div>
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
                    <h5>Lançamento de Previsão Orçamentária</h5>
                </div>
                <div class="ibox-content">
                    @if(isset($orcamentos))
                        @foreach($orcamentos as $orcamento)
                                <form method="post" action="/orcamento/update/{{$orcamento->t11_idOrcamento}}" class="form-horizontal">
                                {!! method_field('PUT')!!}

                                </label>
                         @endforeach
                    @else
                    <form method="post" action="/orcamento/store" class="form-horizontal">
                    @endif
                        {!!csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t10_idDepartamento">Departamento</label>
                            <div class="col-sm-6">
                                    <Select name="t10_idDepartamento" id="t10_idDepartamento" class="form-control">
                                            <option value="">Selecione</option>
                                            @if(isset($orcamento))
                                            <option value="{{$orcamento->t10_idDepartamento}}" selected>{{$orcamento->t11_exercicio}} </option>
                                            @endif
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{$departamento->t10_idDepartamento}}">({{$departamento->t10_sigla}}) - {{$departamento->t10_nome}}</option>
                                                
                                            @endforeach

                                 
                                        </Select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t11_exercicio">Exercício</label>
                            <div class="col-sm-2">
                                <select name="t11_exercicio" id="t11_exercicio" class="form-control">
                                    <option value="">Selecione</option>
                                    @if(isset($orcamento))
                                    <option value="{{$orcamento->t11_exercicio}}" selected>{{$orcamento->t11_exercicio}}</option>
                                    @endif
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>
                            </div>
                           

                        </div>
                        <div class="form-group">
                                <label class="col-sm-2 control-label" for="t11_valor">Verba R$</label>
                                <div class="col-sm-2">
                                    <input type="text" name="t11_valor" id="t11_valor" class="form-control" onKeyPress="return(moeda(this,'.',',',event))">
                                </div>
                           
    
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-2 control-label" for="t11_descricao">Descrição</label>
                                    <div class="col-sm-8">
                                        <textarea name="t11_descricao" id="t11_descricao" class="form-control" >{{$orcamento->t11_descricao or old('t11_descricao')}}</textarea>
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

<script language="javascript">
let valor = document.querySelector('#t11_valor')

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
