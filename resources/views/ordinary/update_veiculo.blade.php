@extends('master2')
@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-danger">
                {{Session::get('status')}}
            </div>
        @endif
        @foreach ($veiculos as $dados)
        <form class="col-md-12" method="POST" action="/car/{{$dados->id}}">
        <input type="hidden" name="id" value="{{$dados->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputmarcaModelo">Marca / modelo</label>
                    <input type="text" class="form-control @error('marcaModelo') is-invalid @enderror" placeholder="Marca / Modelo de veiculo" name="marcaModelo" value="{{$dados->marcaModelo}}">
                    @error('marcaModelo')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="inputTipoVeiculo">Tipo de Veiculo</label>
                    <select id="inputTipoVeiculo" class="form-control" name="tipoVeiculo">
                        <option>Escolher...</option>
                        <option value="Caminhonete" @if ($dados->tipoVeiculo ==='Caminhonete')
                                selected
                                @endif >Caminhonete
                        </option>
                        <option value="Carro Comum" @if ($dados->tipoVeiculo ==='Carro Comum')
                                selected
                                @endif >Carro Comum
                        </option>
                        <option value="Van" @if ($dados->tipoVeiculo ==='Van')
                                selected
                                @endif >Van
                        </option>
                        <option value="Onibus Escolar" @if ($dados->tipoVeiculo ==='Onibus Escolar')
                                selected
                                @endif >Onibus Escolar
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEspecie">Especie de Veiculo</label>
                    <select id="inputEspecie" class="form-control" name="especie">
                        <option>Escolher...</option>
                        <option value="Passageiro" @if ($dados->especie ==='Passageiro')
                                selected
                                @endif >Passageiro
                        </option>
                        <option value="Carga" @if ($dados->especie ==='Carga')
                                selected
                                @endif >Carga
                        </option>
                        <option value="Misto" @if ($dados->especie ==='Misto')
                                selected
                                @endif >Misto
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCategoria">Cadegoria de Veiculo</label>
                    <select id="inputCategoria" class="form-control" name="categoria">
                        <option>Escolher...</option>
                        <option value="Oficial" @if ($dados->especie ==='Oficial')
                                selected
                                @endif >Oficial
                        </option>
                        <option value="Locado" @if ($dados->especie ==='Locado')
                                selected
                                @endif >Locado
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCapacidade">Capacidade Maxima</label>
                    <input type="number" class="form-control @error('capacidade') is-invalid @enderror" name="capacidade" value="{{$dados->capacidade}}" placeholder="Capacidade Maxima do Veiculo">
                    @error('capacidade')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="placa">Placa de Veiculo</label>
                    <input type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" value="{{$dados->placa}}" placeholder="Placa do Veiculo">
                    @error('placa')
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
        @endforeach
    </div>
@stop