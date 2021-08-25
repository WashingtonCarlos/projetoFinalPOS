<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Visualizar Usuario</title>
</head>

<body>
    @foreach($usuarios as $us)
    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            ID:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$us->id}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            CPF:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$us->cpf}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            NOME:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$us->nome}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            E-MAIL:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$us->email}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            ENDEREÇO:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$us->endereco}}</span>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div >
                            TELEFONE:
                        </div>
                        <div >
                            <span class="badge badge-primary badge-pill">{{$us->telefone}}</span>
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