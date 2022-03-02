@extends('master3')
@section('content')
    <div class="container">
        @if (Session()->has('alert-error'))
            <div class="row">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            &times;
                    </button>
                    <strong>Notificação</strong> {{session()->get('alert-error')}}
                </div>
            </div>
        @endif
        <form class="col-md-12" method="POST" action="{{url('/regimoto')}}">
        {{csrf_field()}}
            <div class="form-row form-group">
                <div class="form-group col-md-6">
                    <label for="inputCPF">Numero da CNH</label>
                    <input type="text" class="form-control @error('cnh') is-invalid @enderror" id="cnh" name="cnh" placeholder="Apenas os numeros" >
                    @error('cnh')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" placeholder="Nome Completo">
                @error('nome')
                <div class="invalid-feedback alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco"  name="endereco" placeholder="Apartamento, hotel, casa, etc." >
                @error('endereco')
                <div class="invalid-feedback alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" name ="cidade" id="cidade">
                    @error('cidade')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="inputNivel">Habilitação - Categoria:</label>
                    <select class="form-control" name="categoria" require >
                        <option selected>Escolher...</option>
                        <option value="B">Categoria B</option>
                        <option value="D">Categoria D</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEstado">Estado</label>
                    <select name="estado" class="form-control" required>
                        <option selected>Escolher...</option>
                        <option value="Acre">AC - Acre</option>
                        <option value="Alagoas">AL - Alagoas</option>
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
                    <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" id="cep">
                    @error('cep')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-group col-md-3">
                    <label for="inputTEL">telefone</label>
                    <input class="form-control @error('telefone') is-invalid @enderror" type="text" name="telefone" id="telefone" >
                    @error('telefone')
                        <div class="invalid-feedback alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-primary col-md-4">Salvar</button>
            </div>
        </form>
    </div>
@stop