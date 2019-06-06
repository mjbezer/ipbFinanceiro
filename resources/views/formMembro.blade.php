@extends('layouts.template')

@push('css')

<link rel="stylesheet" href="{{ asset('css/plugins/datapicker/datepicker3.css') }}">
@endpush

@section('content')

<!-- modal de validação-->

                @if( isset($errors) && count($errors) > 0 )
                <section class="error-message">
                        <div class="modal inmodal modal-show" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true"  style="background-color:rgba(0,0,0,0.5);" >
                            <div class="modal-dialog modal-lg">
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
                                               <div class="col-md-6">
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

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Membros</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Novo Membro</strong>
            </li>
        </ol>
    </div>

</div>
<!-- Inicio do Form de Membros-->
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row a">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Cadastro de Membros </h5>

                </div>
                <div class="ibox-content">
                
                @if(isset($membro))
                    @foreach ($membro as $membro)
                    <form method="post" action="{{route('membro.update',$membro->t03_idMembro)}}" class="form-horizontal">
                    {!! method_field('PUT')!!}
                    @endforeach
               
                @else
                <form method="post" action="{{route('membro.store')}}" class="form-horizontal">
                        <input type="hidden" name="t03_situacao" value="Ativo">
                @endif
                            {!!csrf_field() !!}

                        <span class="text-navy">
                            <h3>Dados Pessoais</h3>
                        </span>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_nome">Nome</label>
                            <div class="col-sm-6">
                                <input type="text" name="t03_nome" id="t03_nome" class="form-control" value="{{$membro->t03_nome or old('t03_nome')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_endereco">Endereço</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_endereco" id="t03_endereco" class="form-control" value="{{$membro->t03_endereco or old('t03_endereco')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t03_complemento">Complemento</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_complemento" id="t03_complemento" class="form-control" value="{{$membro->t03_complemento or old('t03_complemento')}}">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_bairro">Bairro</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_bairro" id="t03_bairro" class="form-control" value="{{$membro->t03_bairro or old('t03_bairro')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t03_cep">CEP</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_cep" id="t03_cep" class="form-control" value="{{$membro->t03_cep or old('t03_cep')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_cidade">Cidade</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_cidade" id="t03_cidade" class="form-control" value="{{$membro->t03_cidade or old('t03_cidade')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t03_UF">Estado</label>
                            <div class="col-sm-3">
                                <select name="t03_UF" id="t03_UF" class="form-control">
                                        <option value="">Selecione</option>
                                        @if(isset($membro))
                                        <option selected value="{{$membro->t03_UF}}" >{{$membro->t03_UF}}</option>
                                        @endif
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                  
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_foneResidencial">Fone (Residencial) DDD+</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_foneResidencial" id="t03_foneResidencial" class="form-control" data-mask="(99) 9999-9999" value="{{$membro->t03_foneResidencial or old('t03_foneResidencial')}}">
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label" for="t03_foneComercial">Fone (Comercial)</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_foneComercial" id="t03_foneComercial" class="form-control" data-mask="(99) 9999-9999" value="{{$membro->t03_foneComercial or old('t03_foneComercial')}}">
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="col-sm-2 control-label" for="t03_foneCelular">Celular</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_foneCelular" id="t03_foneCelular" class="form-control" data-mask="(99) 9.9999-9999" value="{{$membro->t03_foneCelular or old('t03_foneCelular')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_email">E-Mail</label>
                            <div class="col-sm-6">
                                <input type="email" name="t03_email" id="t03_email" class="form-control" value="{{$membro->t03_email or old('t03_email')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_dtNascimento">Data Nascimento </label>
                            <div class="col-sm-3" id="data_1">
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="date" name="t03_dtNascimento" id="t03_dtNascimento" class="form-control" value="{{$datas['t03_dtNascimento'] or old('t03_dtNascimento')}}">
                                </div>
                            </div>
                            <label class="col-sm-2 control-label" for="t03_genero">Genero</label>
                            <div class="col-sm-3">
                                <select class="form-control m-b" name="t03_genero">
                                    <option value="">Selecione</option>
                                    @if(isset($membro))
                                    <option value="{{$membro->t03_genero}}" selected>{{$membro->t03_genero}}</option>
                                    @endif
                                    
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_naturalidade">Naturalidade</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_naturalidade" id="t03_naturalidade" class="form-control" value="{{$membro->t03_naturalidade or old('t03_naturalidade')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_cpf">CPF</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_cpf" id="t03_cpf" class="form-control " data-mask="999.999.999-99" value="{{$membro->t03_cpf or old('t03_cpf')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t03_rg">RG</label>
                            <div class="col-sm-3">
                                <input type="text" name="t03_rg" id="t03_rg" class="form-control"  value="{{$membro->t03_rg or old('t03_rg')}}">
                            </div>
                        </div>
                        <span class="text-navy">
                            <h3>Dados Familiares</h3>
                        </span>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_estadoCivil">Estado Cívil</label>
                            <div class="col-sm-3">
                                <select class="form-control m-b" name="t03_estadoCivil">
                                        <option value="">Selecione</option>
                                     @if(isset($membro))
                                        <option value="{{$membro->t03_estadoCivil}}" selected>{{$membro->t03_estadoCivil}}</option>
                                    @endif
                                        <option value="Solteiro">Solteiro(a)</option>
                                        <option value="Casado">Casado(a)</option>
                                        <option value="Divorciado">Divorciado(a)</option>
                                        <option value="Viúvo">Viúvo(a)</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label" for="t03_dtCasamento">Data Casamento</label>
                            <div class="col-sm-3" id="data_1">
                                <div class="input-group date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                <input type="date" name="t03_dtCasamento" id="t03_dtCasamento" class="form-control" value="{{$datas['t03_dtCasamento'] or old('t03_dtCasamento')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_conjuge">Nome Conjuge</label>
                            <div class="col-sm-6">
                                <input type="text" name="t03_conjuge" id="t03_conjuge" class="form-control" value="{{$membro->t03_conjuge or old('t03_conjuge')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_nomePai">Nome do Pai </label>
                            <div class="col-sm-6">
                                <input type="text" name="t03_nomePai" id="t03_nomePai" class="form-control" value="{{$membro->t03_nomePai or old('t03_nomePai')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t03_nomeMae">Nome da Mãe</label>
                            <div class="col-sm-6">
                                <input type="text" name="t03_nomeMae" id="t03_nomeMae" class="form-control" value="{{$membro->t03_nomeMae or old('t03_nomeMae')}}">
                            </div>
                        </div>
                        <span class="text-navy">
                            <h3>Dados Eclesiásticos</h3>
                        </span>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t04_idStatus">Situação do Membro</label>
                            <div class="col-sm-3">
                                <select class="form-control m-b" name="t04_idStatus">
                                        <option value="">Selecione</option>
                                    @if(isset($membro))
                                        <option value="{{$membro->t04_idStatus}}" selected>{{$membro->t04_nome}}</option>
                                    @endif
                                    @foreach ($membresia as $membroMembresia)
                                           <option value="{{$membroMembresia->t04_idStatus}}">{{$membroMembresia->t04_nome}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-6">
                            <label class="col-sm-2 control-label">Dizimista </label>

                                <label class="checkbox-inline">
                                    <input type="radio" value="sim" name="t03_dizimista" id="t03_dizimista" @if(isset($membro) && $membro->t03_dizimista == 'sim') checked @endif>Sim</label>
                                <label class="checkbox-inline">
                                    <input type="radio" value="não" name="t03_dizimista" id="t03_dizimista" @if(isset($membro) && $membro->t03_dizimista == 'não') checked @endif>Não</label>

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