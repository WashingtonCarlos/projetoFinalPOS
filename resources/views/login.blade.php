  @extends('master')
@section('content')
  <div class="container">
      @if(Session::has('status'))
        <div class="alert alert-danger">
            {{Session::get('status')}}
        </div>
      @endif
    <form class="form-signin" method ="POST" action = "{{url('/acesso')}}">
    {{csrf_field()}}
      <h1 class="h3 mb-3 font-weight-normal text-center">Faça login</h1>
      <label for="inputNumber" class="sr-only">CPF</label>
      <input type="text" id="inputNumber"  class="form-control" name="cpf" placeholder="CPF - somente os numeros" onkeypress="return onlynumber();" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="password" class="form-control" name="password" placeholder="Senha" required>
<<<<<<< HEAD

=======
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
          <div class="flex items-center justify-end mt-4">
                <a class="btn" href="{{ url('auth/facebook') }}"
                    style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with Facebook
                </a>
            </div>
        </label>
      </div>
>>>>>>> 0e8546bc56e4d53724e746addf26dea24183e6dd
      <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 - Seção de Manutenção</p>      
      <p class = "text-center text-danger">
      </p>
    </form>
  </div>
@stop