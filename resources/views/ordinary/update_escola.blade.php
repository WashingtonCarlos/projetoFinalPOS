@extends('master2')
@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-danger">
                {{Session::get('status')}}
            </div>
        @endif
        @foreach ($escolas as $dados)
        <form class="col-md-12" method="POST" action="/schools/{{$dados->id}}">
        <input type="hidden" name="id" value="{{$dados->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEscola">Nome da Escola</label>
                    <input type="text" class="form-control" name="nome_da_escola" placeholder="Nome da Escola do Municipio"
                     value="{{$dados->nome_da_escola}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputDiretor">Diretor(a) da Escola</label>
                    <input type="text" class="form-control" id="diretor" name="diretor" placeholder="Diretor(a) da Escola" value="{{$dados->diretor}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputViceDiretor">Vice-Diretor(a) da Escola</label>
                <input type="text" class="form-control" id="ViceDiretor" name="ViceDiretor" aria-describedby="emailHelp"
                    placeholder="Seu email" value="{{$dados->ViceDiretor}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email da Escola</label>
                <input type="email" class="form-control" name="email" placeholder="Nome Completo" value="{{$dados->email}}" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço da Escola</label>
                <input type="text" class="form-control"  name="endereco" placeholder="Apartamento, hotel, casa, etc." value="{{$dados->endereco}}" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTEL">telefone</label>
                    <input type="text" class="form-control" name ="telefone" value="{{$dados->telefone}}" required>
                </div>
            </div>
            <div class="form-group col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-primary col-md-4">Salvar</button>
            </div>
        </form>
        @endforeach
    </div>
@stop