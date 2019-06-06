@extends('layouts.app')

@section('content')
<body class="gray-bg ">
    <div class="loginColumns animated fadeInDown ">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Bem Vindo ao GEFIG</h2>
                <img src="img/logolog.png">
               
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name='email' placeholder="E-Mail"  value="{{old('email')}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                         @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Senha" >
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Salvar Senha
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="{{ route('password.request') }}">
                            <small>Esqueceu a Senha?</small>
                        </a>

                     
                    </form>
                    <p class="m-t">
                        <small>GEFIG - Gestão Financeira para Igrejas &copy; 2019</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright M2F- Soluções Web
            </div>
            <div class="col-md-6 text-right">
            <small>© 2018-2019</small>
            </div>
        </div>
    </div>
</body>
@endsection
