@extends('master2')
@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-danger">
                {{Session::get('status')}}
            </div>
        @endif
        @foreach ($social as $dados)
        <form class="col-md-12" method="POST" action="{{route('cadastrasocial')}}">
        {{csrf_field()}}
        <input type="hidden" name="fb_id" value="{{$dados['fb_id']}}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCPF">CPF</label>
                    <input type="text"  class="form-control @error('cpf') is-invalid @enderror" placeholder="Apenas os numeros" name="cpf" id="cpf">
                    @error('cpf')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Senha" >
                    @error('password')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Seu email" value="{{$dados['email']}}" required>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="{{$dados['name']}}" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control @error('endereco') is-invalid @enderror"  name="endereco" id="endereco" placeholder="Apartamento, hotel, casa, etc." >
                @error('endereco')
                <div class="invalid-feedback alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name ="cidade" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNivel">Nivel de Acesso</label>
                    <select id="inputNivel" class="form-control" name="nivel_de_acesso" required>
                        <option>Escolher...</option>
                        <option value="1">Administrador</option>
                        <option value="2" selected>Usuario</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Estado</label>
                    <select name="estado" class="form-control" required>
                        <option selected>Escolher...</option>
                        <option value="Acre"> AC - Acre</option>
                        <option value="Alagoas"> AL - Alagoas</option>
                        <option value="Amapá">AP - Amapá</option>
                        <option value="Amazonas">AM - Amazonas</option>
                        <option value="Bahia">BA - Bahia</option>
                        <option value="Ceará">CE - Ceará</option>
                        <option value="Distrito Federal">DF - Distrito Federal</option>
                        <option value="Espirito Santo">ES - Espirito Santo</option>
                        <option value="Goiás">GO - Goiás</option>
                        <option value="Maranhão">MA - Maranhão</option>
                        <option value="Mato Grosso">MT - Mato Grosso</option>
                        <option value="Mato Grosso do Sul">MS - Mato Grosso do Sul</option>
                        <option value="Minas Gerais">MG - Minas Gerais</option>
                        <option value="Pará">PA - Pará</option>
                        <option value="Paraíba">PB - Paraíba</option>
                        <option value="Paraná">PR - Paraná</option>
                        <option value="Pernambuco">PE - Pernambuco</option>
                        <option value="Piauí">PI - Piauí</option>
                        <option value="Rio de Janeiro">RJ - Rio de Janeiro</option>
                        <option value="Rio Grande do Norte">RN - Rio Grande do Norte</option>
                        <option value="Rio Grande do Sul">RS - Rio Grande do Sul</option>
                        <option value="Rondônia">RO - Rondônia</option>
                        <option value="Roraima">RR - Roraima</option>
                        <option value="Santa Catarina">SC - Santa Catarina</option>
                        <option value="São Paulo">SP - São Paulo</option>
                        <option value="Sergipe">SE - Sergipe</option>
                        <option value="Tocantins">TO - Tocantins</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" name="cep" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group col-md-3">
                    <label for="inputTEL">telefone</label>
                    <input class="form-control" type="text" name="telefone" require>
                </div>
            </div>
            <div class="form-group col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-primary col-md-4">Salvar</button>
            </div>
        </form>
        @endforeach
    </div>
@stop