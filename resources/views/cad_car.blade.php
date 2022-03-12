<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Bootstrap para cadastro ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Cadastro de Veiculo</title>
</head>

<body>
    <div class="container">
        @if (Session()->has('alert-error'))
        <div class="row align-items-end">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <strong>Notificação</strong> {{session()->get('alert-error')}}
            </div>
        </div>
        @endif

        <form class="col-md-12" method="POST" action="{{url('/registrarVeiculo')}}">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputmarcaModelo">Marca / modelo</label>
                    <input type="text" class="form-control @error('marcaModelo') is-invalid @enderror" placeholder="Marca / Modelo de veiculo" name="marcaModelo" id="marcaModelo">
                    @error('marcaModelo')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="inputTipoVeiculo">TIpo de Veiculo</label>
                    <select id="inputTipoVeiculo" class="form-control" name="tipoVeiculo">
                        <option>Escolher...</option>
                        <option value="Caminhonete">Caminhonete</option>
                        <option value="Carro Comum">Carro Comum</option>
                        <option value="Van">Van</option>
                        <option value="Onibus Escolar">Onibus Escolar</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEspecie">Especie de Veiculo</label>
                    <select id="inputEspecie" class="form-control" name="especie">
                        <option>Escolher...</option>
                        <option value="Passageiro">Passageiro</option>
                        <option value="Carga">Carga</option>
                        <option value="Misto">Misto</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCategoria">Cadegoria de Veiculo</label>
                    <select id="inputCategoria" class="form-control" name="categoria">
                        <option>Escolher...</option>
                        <option value="Oficial">Oficial</option>
                        <option value="Locado">Locado</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCapacidade">Capacidade Maxima</label>
                    <input type="number" class="form-control @error('capacidade') is-invalid @enderror" name="capacidade" id="capacidade" placeholder="Capacidade Maxima do Veiculo">
                    @error('capacidade')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="placa">Placa de Veiculo</label>
                    <input type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" id="placa" placeholder="Placa do Veiculo">
                    @error('placa')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-lg-12" style="text-align: right;">
                <div>
                    <button type="submit" class="btn btn-primary col-md-4">Salvar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>