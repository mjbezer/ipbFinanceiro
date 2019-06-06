<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IPB-Financeiro</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ipbStyle.css') }}" rel="stylesheet">


    @stack('css')


</head>

<body>
    <div id="wrapper">
        <!-- Inicio da Barra Lateral (side Bar)-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse ">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element "> <span>
                                <img alt="image" class="img-circle" src="{{ asset('img/profile_small.jpg')}}" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{ Auth::user()->name }}</strong>
                                    </span> <span class="text-muted text-xs block"> {{ Auth::user()->email }} <b
                                            class="caret"></b></span> </span> </a>
                           <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Perfil</a></li>
                                <li><a href="#">Tarefas</a></li>
                                <li><a href="#">Mensagens</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>-->
                        </div>
                        <div class="logo-element">
                            IPB-Fin
                        </div>
                    </li>
                    <!-- Inicio (Menu)-->
                    <li>
                        <a href="#"><i class="fa fa-user-circle-o"></i> <span class="nav-label">Membros</span> <span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="{{route('membro.create')}}">Novo Membro</a></li>
                            <li><a href="{{route('membro.index')}}">Lista Geral</a></li>
                            <li><a href="#">Aniversáriantes do Mês</a></li>
                            <li><a href="#">Membros Ativos</a></'li>
                            <li><a href="#">Membros Inativos</a></li>
                            <li><a href="#">Faixa Etária </a></li>
                            <li class="hr-line-dashed"></li>
                            <li><a href="{{route('membresia.index')}}">Membresia</a></li>
                       </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-truck"></i> <span class="nav-label">Fornecedores</span> <span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li ><a href="/fornecedores/tipo">Tipo Fornecedor</a></li>
                            <li ><a href="/fornecedores/create">Novo Fornecedor</a></li>
                            <li><a href="/fornecedores/list">Lista Geral</a></li>
                       </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">Bancos</span> <span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        
                            <li ><a href="/contas/create">Conta</a></li>
                            <li><a href="/contas/list">Listagem</a></li>
                            <li><a href="#">Tranferencia</a></li>
                                
                            
                       </ul>

                    <li>
                            <li>
                                    <a href="#"><i class="fa fa-line-chart"></i> <span class="nav-label">Orçamento</span> <span
                                            class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                    
                                        <li ><a href="#">Previsão de Orçamentaria</a></li>
                                        <li><a href="#">Adição de Verba</a></li>
                                        <li><a href="#">Relatorios</a></li>
                                            
                                        
                                   </ul>
            
                                <li>
                                
                         
                    <li class="">
                        <a href="#"><i class="fa fa-bar-chart"></i> <span class="nav-label">Financeiro </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" style="height: 0px;">
                            <li>
                                <a href="#" id="damian">Administrativo <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                                 <li><a href="#">Departamentos</a></li>
                                                <li><a href="#">Conta Contábil Receitas</a></li>
                                                <li><a href="#">Conta Contábil Despesas</a></li>
                                                <li><a href="#">Forma de Recebimento</a></li>
                                                <li><a href="#">Forma de Pagamento</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contas a Receber</a></li>
                            <li><a href="#">Contas a Pagar</a></li>
                            <li>
                                <a href="#" id="damian">Relatórios <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level collapse">
                                    <li><a href="#">Geral</a></li>
                                    <li><a href="#">Por Fornecedor</a></li>
                                    <li><a href="#">Por Contribuinte</a></li>
                                    <li><a href="#">Por Departamento</a></li>
                                    <li><a href="#">Por Conta Contabil</a></li>
                                </ul>
                           
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Caixa & Bancos</span> <span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          
                            <li><a href="#">Recebimento Receitas</a></li>
                            <li ><a href="#">Pagamento Despesas</a></li>
                            <li><a href="#">Relatórios</a></li>
                             
                            
                       </ul>
                    </li>


                    <!-- Fim (Menu)-->

                </ul>

            </div>
        </nav>
        <!-- Fim da Barra Lateral (side Bar)-->


        <div id="page-wrapper" class="gray-bg">
            <!-- Inicio da Barra de Ferramentas (topo)-->

            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <img src="{{ asset('img/logoIpjt.png') }}" alt="Igreja Presbiteriana Jardim Tranquilidade">
                        </li>



                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> 
                                Logout
                            </a>
                            </a>
                        </li>
                        <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- FIM da Barra de Ferramentas (topo)-->

            </div>
            
            <!-- Início da área de Trabalho-->

            @yield('content')


            <!-- Fim da área de Trabalho-->
            
            <!-- Início da Footer-->
            <div class="row">
                <div class="footer">
                    <div class="pull-right">
                        Desenvolvido por :<strong> M2F - </strong>Soluções Web.
                    </div>
                    <div>
                        <strong>Copyright</strong> IPB- Financeiro &copy; 2019
                    </div>
                </div>
            </div>
            <!-- Fim da Footer-->


        </div>

   </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js".js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

    

    @stack('js')

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('Igreja Presbiteriana Jardim Tranquilidade', 'IPB- Financeiro');

            }, 1300);


          
    </script>
    
</body>

</html>