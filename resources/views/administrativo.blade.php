<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Administrativo</title>
</head>

<body>

    <div class="container">
        @if(Session::has('status'))
        <div class="alert alert-danger">
            {{Session::get('status')}}
        </div>
        @endif

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-black-50" href="#">FROTA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('acessar')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cad_usu')}}">Cadastro de usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cadMoto')}}">Cadastro de motorista</a>
                    </li>
                    <li class="nav-item disabled">
                        <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->nome}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{url('/logout')}}">Sair</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 navbar-right" action="{{route('funcionarios.search')}}" method="POST">
                    {{csrf_field()}}
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">pesquisa</button>
                </form>
            </div>
        </nav>


        <h4>Tabela de Cadastrados de funcionarios</h4>
        <div class="container">


            <table id="mytable" class="table">

                <thead>
                    <th> ID </th>
                    <th>nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Nivel de Acesso</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    <th>Visualizar</th>
                    <th>trocar a senha</th>
                </thead>
                <tbody>
                    @foreach ($usuarios as $us)
                    <tr>
                        <td>{{ $us->id }}</td>
                        <td>{{ $us->nome }}</td>
                        <td>{{ $us->cpf }}</td>
                        <td>{{ $us->email }}</td>
                        <td class="text-center">{{ $us->nivel_de_acesso }}</td>

                        <td>
                            <p data-placement='top' data-toggle='tooltip' title='Editar'>
                                <a href="{{url('editar',[$us->id])}}">
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target='#edit'>
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle='tooltip' title="Deletar">
                                <a href="{{url('deletar',[$us->id])}}" onclick="return confirm('Voce realmente deseja deletar o usuario ?');"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                        <span class="glyphicon glyphicon-trash">

                                        </span>
                                    </button></a>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Visualizar">
                                <a href="{{url('busca',[$us->id])}}"><button class="btn btn-info btn-xs" data-title="Visualizar" data-toggle="modal" data-target="#visualizar">
                                        <span class="glyphicon glyphicon-eye-open">

                                        </span>
                                    </button></a>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Atualizar Senha">
                                <a href="{{url('senha',[$us->id])}}"><button class="btn btn-info btn-xs" data-title="Senha" data-toggle="modal" data-target="#senha">
                                        <span class="glyphicon glyphicon-refresh">

                                        </span>
                                    </button></a>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $usuarios->links() !!}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>