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
        <h2>Fornecedores</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Novo Fornecedor</strong>
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
                    <h5>Cadastro de Fornecedor </h5>

                </div>
                <div class="ibox-content">
                
                @if(isset($fornecedor))
                <form method="post" action="/fornecedores/update/{{$fornecedor->t08_idFornecedor}}" class="form-horizontal">
                    {!! method_field('PUT')!!}
                    
                @else
                <form method="post" action="/fornecedores/store" class="form-horizontal">
                @endif
                            {!!csrf_field()!!}

                        <span class="text-navy">
                        </span>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_nome">Razao Social</label>
                            <div class="col-sm-6">
                                <input type="text" name="t08_nome" id="t08_nome" class="form-control" value="{{$fornecedor->t08_nome or old('t08_nome')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_endereco">Endereço</label>
                            <div class="col-sm-3">
                                <input type="text" name="t08_endereco" id="t08_endereco" class="form-control" value="{{$fornecedor->t08_endereco or old('t08_endereco')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t08_complemento">Complemento</label>
                            <div class="col-sm-3">
                                <input type="text" name="t08_complemento" id="t08_complemento" class="form-control" value="{{$fornecedor->t08_complemento or old('t08_complemento')}}">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_bairro">Bairro</label>
                            <div class="col-sm-3">
                                <input type="text" name="t08_bairro" id="t08_bairro" class="form-control" value="{{$fornecedor->t08_bairro or old('t08_bairro')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t08_cep">CEP</label>
                            <div class="col-sm-3">
                                <input type="text" name="t08_cep" id="t08_cep" class="form-control" value="{{$fornecedor->t08_cep or old('t08_cep')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_cidade">Cidade</label>
                            <div class="col-sm-3">
                                <input type="text" name="t08_cidade" id="t08_cidade" class="form-control" value="{{$fornecedor->t08_cidade or old('t08_cidade')}}">
                            </div>
                            <label class="col-sm-2 control-label" for="t08_UF">Estado</label>
                            <div class="col-sm-3">
                                <select name="t08_UF" id="t08_UF" class="form-control">
                                        <option value="">Selecione</option>
                                        @if(isset($fornecedor))
                                        <option selected value="{{$fornecedor->t08_UF}}" >{{$fornecedor->t08_UF}}</option>
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

                                <label class="col-sm-2 control-label" for="t08_foneComercial">Fone (Comercial)</label>
                                <div class="col-sm-3">
                                    <input type="text" name="t08_foneComercial" id="t08_foneComercial" class="form-control"  value="{{$fornecedor->t08_foneComercial or old('t03_foneComercial')}}">
                                </div>
                            </div>
                            <div class="form-group">
    
                                <label class="col-sm-2 control-label" for="t08_foneCelular">Celular</label>
                                <div class="col-sm-3">
                                    <input type="text" name="t08_foneCelular" id="t08_foneCelular" class="form-control"  value="{{$fornecedor->t08_foneCelular or old('t08_foneCelular')}}">
                                </div>
                            </div>
    

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_email">E-Mail</label>
                            <div class="col-sm-6">
                                <input type="email" name="t08_email" id="t08_email" class="form-control" value="{{$fornecedor->t08_email or old('t08_email')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_site">Site</label>
                            <div class="col-sm-6">
                                <input type="text" name="t08_site" id="t08_site" class="form-control" value="{{$fornecedor->t08_site or old('site')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="t08_cpfCnpj">CPF/CNPJ</label>
                            <div class="col-sm-3">
                                <input type="text" name="t08_cpfCnpj" id="t08_cpfCnpj" class="form-control "  value="{{$fornecedor->t08_cpfCnpj or old('t08_cpfCnpj')}}">
                            </div>
                          
                        </div>
                        <div class="form-group">

                            <label class="col-sm-2 control-label" for="t09_idCategoriaFornecedores">Categoria</label>
                            <div class="col-sm-3">
                                <select name="t09_idCategoriaFornecedores" id="t09_idCategoriaFornecedores" class="form-control">
                                    <option value="">Selecione</option>
                                  @if(isset($fornecedor))
                                        <option selected value="{{$fornecedor->t09_idCategoriaFornecedores}}" >{{$fornecedor->categoria->t09_nome}}</option>
                                        @endif
                                  @foreach ($categoriaFornecedores as $categoriaFornecedor)
                                    <option value="{{$categoriaFornecedor->t09_idCategoriaFornecedores}}">{{$categoriaFornecedor->t09_nome}}</option>
                                  @endforeach

                                </select>
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
<script src="{{asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/jsmask/jquery.mask.js')}}"></script>


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
             $("#t08_foneComercial").keydown(function(){
                $("#t08_foneComercial").mask("(99) 9999-9999")
                 var elem = this;
                setTimeout(function(){
                    elem.selectionStart = elem.selectionEnd = 10000;
                }, 0);
                var currentValue = $(this).val();
                $(this).val('');
                $(this).val(currentValue);
            })
            $("#t08_foneCelular").keydown(function(){
                $("#t08_foneCelular").mask("(99) 9.9999-9999")
                 var elem = this;
                setTimeout(function(){
                    elem.selectionStart = elem.selectionEnd = 10000;
                }, 0);
                var currentValue = $(this).val();
                $(this).val('');
                $(this).val(currentValue);
            })

            $("#t08_cpfCnpj").keydown(function(){
                 try {
                    $("#t08_cpfCnpj").unmask();
                } catch (e) {}

                var tamanho = $("#t08_cpfCnpj").val().length;

                if(tamanho < 11){
                    $("#t08_cpfCnpj").mask("999.999.999-99");
                } else {
                    $("#t08_cpfCnpj").mask("99.999.999/9999-99");
                }

                // ajustando foco
                var elem = this;
                setTimeout(function(){
                    // mudo a posição do seletor
                    elem.selectionStart = elem.selectionEnd = 10000;
                }, 0);
                // reaplico o valor para mudar o foco
                var currentValue = $(this).val();
                $(this).val('');
                $(this).val(currentValue);
            });
        </script>
       

@endpush