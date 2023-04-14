<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Visualizar Motorista</title>
</head>

<body>
    @foreach($veiculos as $dados)
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            ID:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->id}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            MARCA / MODELO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->marcaModelo}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                        TIPO DE VEICULO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->tipoVeiculo}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                        ESPECIE DE VEICULO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->especie}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            CATEGORIA DE VEICULO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->categoria}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            CAPACIDADE MAXIMA DO VEICULO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->capacidade}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                        PLACA DO VEICULO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$dados->placa}}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</body>

</html>