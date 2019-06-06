@extends('layouts.template')

@section('content')

<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Membros</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Inclusão de Evento</strong>
            </li>
        </ol>
    </div>

</div>
<!-- Inicio do Form de Membros-->
<div class="col-md-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Novo Evento </h5>

            </div>
            <div class="ibox-content">
                <form method="post" action="#" class="form-horizontal">
                    {!!csrf_field() !!}
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="t05_nome">Evento</label>
                        <div class="col-sm-6">
                                <select class="form-control m-b" name="t05_nome">
                                        <option value="">Selecione</option>
                                        <option value="Nomeação">Nomeação</option>
                                        <option value="Disciplina">Disciplina</option>
                                        <option value="Inativo">Inativo</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="t05_descricao">Descrição</label>
                        <div class="col-sm-8">
                            <textarea name="t04_descricao" id="t05_descricao" class="form-control"></textarea>
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
@endsection

