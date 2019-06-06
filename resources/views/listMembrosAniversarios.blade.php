@extends('layouts.template')

@push('css')

<link rel="stylesheet" href="{{ asset('css/plugins/datapicker/datepicker3.css') }}">

@endpush
@section('content')




<!--Titulo da Página -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Membros</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong>Aniversáriantes</strong>
            </li>
        </ol>
    </div>

</div>
<!-- Inicio da listagem de status de membresia-->
                    <div class="wrapper wrapper-content animated fadeInUp">
    
                            <div class="row">
                                    <div class="col-lg-3">

                                    </div>
                                    <div class="col-lg-9">
                                        <div class="ibox">
                                            <div class="ibox-content">
                                                <h2>Lista Membros Aniveráriante Mês de  </h2>
                                               
              
                                                <div class="clients-list">
                                                
                                                <div class="tab-content">
                                                    <div id="tab-1" class="tab-pane active">
                                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-hover">
                                                                    <thead>
                                                                        <th>Status</th>
                                                                        <th>Nome</th>
                                                                        <th>Celular</th>
                                                                        <th>E-mail</th>
                                                                        <th>Nascimento</th>
                                                                        <th>Idade</th>

                                                                   </thead>
                                                                    
                                                                    <tbody>
                                                                   
                                                                    
                                                                     </tbody>
                                                                </table>
                                                            </div>
                                                        </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 365.112px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                                    </div>
                    
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                           

   
   


@endsection

@push('js')
<script src="   js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
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


@endpush