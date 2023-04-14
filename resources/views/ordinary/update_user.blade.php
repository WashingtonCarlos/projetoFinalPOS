@extends('master2')
@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-danger">
                {{Session::get('status')}}
            </div>
        @endif
        @foreach ($usuarios as $dados)
        <form class="col-md-12" method="POST" action="/users/{{$dados->id}}">
        <input type="hidden" name="id" value="{{$dados->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCPF">CPF</label>
                    <input type="text" class="form-control" name="cpf" placeholder="Apenas os numeros" value="{{$dados->cpf}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" class="form-control" name="password" placeholder="Senha">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Seu email" value="{{$dados->email}}" required>
            </div>
            <div class="form-group">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="{{$dados->nome}}" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control"  name="endereco" placeholder="Apartamento, hotel, casa, etc." value="{{$dados->endereco}}" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name ="cidade" value="{{$dados->cidade}}" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNivel">Nivel de Acesso</label>
                    <select id="inputNivel" class="form-control" name="nivel_de_acesso" value="{{$dados->nivel_de_acesso}}" required>
                        <option selected>Escolher...</option>
                        <option value="1" @if ($dados->nivel_de_acesso === '1')
                            selected
                        @endif>Administrador</option>
                        <option value="2" @if ($dados->nivel_de_acesso === '2')
                            selected        
                        @endif>Usuario</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Estado</label>
                    <select name="estado" class="form-control" required>
                        <option selected>Escolher...</option>
                        <option value="Acre" @if ($dados->estado ==='Acre')
                           selected
                        @endif >AC - Acre</option>
                        <option value="Alagoas" @if ($dados->estado ==='Alagoas')
                            selected
                        @endif>AL - Alagoas</option>
                        <option value="Amapá" @if ($dados->estado === 'Amapá')
                            selected
                        @endif>AP - Amapá</option>
                        <option value="Amazonas" @if ($dados->estado === 'Amazonas')
                            selected
                        @endif>AM - Amazonas</option>
                        <option value="Bahia" @if ($dados->estado === 'Bahia') 
                            selected
                        @endif >BA - Bahia</option>
                        <option value="Ceará" @if ($dados->estado === 'Ceará')
                            selected
                        @endif>CE - Ceará</option>
                        <option value="Distrito Federal" @if ($dados->estado === 'Distrito Federal')
                            selected
                        @endif>DF - Distrito Federal</option>
                        <option value="Espirito Santo" @if ($dados->estado === 'Espirito Santo')
                            selected
                        @endif>ES - Espirito Santo</option>
                        <option value="Goiás" @if ($dados->estado === 'Goiás')
                            selected
                        @endif>GO - Goiás</option>
                        <option value="Maranhão" @if ($dados->estado === 'Maranhão')
                            selected
                        @endif>MA - Maranhão</option>
                        <option value="Mato Grosso" @if ($dados->estado === 'Mato Grosso')
                            selected
                        @endif>MT - Mato Grosso</option>
                        <option value="Mato Grosso do Sul" @if ($dados->estado === 'Mato Grosso do Sul')
                            selected
                        @endif>MS - Mato Grosso do Sul</option>
                        <option value="Minas Gerais" @if ($dados->estado === 'Minas Gerais')
                            selected
                        @endif>MG - Minas Gerais</option>
                        <option value="Pará" @if ($dados->estado === 'Pará')
                            selected
                        @endif>PA - Pará</option>
                        <option value="Paraíba" @if ($dados->estado === 'Paraíba')
                            selected
                        @endif>PB - Paraíba</option>
                        <option value="Paraná" @if ($dados->estado === 'Paraná')
                            selected
                        @endif>PR - Paraná</option>
                        <option value="Pernambuco" @if ($dados->estado === 'Pernambuco')
                            selected
                        @endif>PE - Pernambuco</option>
                        <option value="Piauí" @if ($dados->estado === 'Piauí')
                            selected
                        @endif>PI - Piauí</option>
                        <option value="Rio de Janeiro" @if ($dados->estado === 'Rio de Janeiro')
                            selected
                        @endif>RJ - Rio de Janeiro</option>
                        <option value="Rio Grande do Norte" @if ($dados->estado === 'Rio Grande do Norte')
                            selected
                        @endif>RN - Rio Grande do Norte</option>
                        <option value="Rio Grande do Sul" @if ($dados->estado === 'Rio Grande do Sul')
                            selected
                        @endif>RS - Rio Grande do Sul</option>
                        <option value="Rondônia" @if ($dados->estado === 'Rondônia')
                            selected
                        @endif>RO - Rondônia</option>
                        <option value="Roraima" @if ($dados->estado === 'Roraima')
                            selected
                        @endif>RR - Roraima</option>
                        <option value="Santa Catarina" @if ($dados->estado === 'Santa Catarina')
                            selected
                        @endif>SC - Santa Catarina</option>
                        <option value="São Paulo" @if ($dados->estado === 'São Paulo')
                            selected
                        @endif>SP - São Paulo</option>
                        <option value="Sergipe" @if ($dados->estado === 'Sergipe')
                            selected
                        @endif>SE - Sergipe</option>
                        <option value="Tocantins" @if ($dados->estado === 'Tocantins')
                            selected
                        @endif>TO - Tocantins</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" name="cep" value="{{$dados->cep}}" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group col-md-3">
                    <label for="inputTEL">telefone</label>
                    <input class="form-control" type="text" name="telefone" value="{{$dados->telefone}}" require>
                </div>
            </div>
            <div class="form-group col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-primary col-md-4">Salvar</button>
            </div>
        </form>
        @endforeach
    </div>
@stop