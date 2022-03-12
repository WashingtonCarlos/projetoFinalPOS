<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!------ Include the above in your HEAD tag ---------->

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFrota">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarFrota">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/funcionarios')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                            {{auth()->user()->nome}}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{url('/logout')}}">Sair</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cadEscola')}}">Cadastro de Escola</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline my-2 my-lg-0 navbar-right" action="{{route('escolas.search')}}" method="POST">
                {{csrf_field()}}
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisa" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">pesquisa</button>
            </form>
        </nav>


        <h4>Tabela de Cadastrados de Escolas</h4>
        <div class="container">


            <table id="mytable" class="table">

                <thead>
                    <th> ID </th>
                    <th>nomeEscola</th>
                    <th>diretor</th>
                    <th>ViceDiretor</th>
                    <th>email</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    <th>Visualizar</th>
                </thead>
                <tbody>
                    @foreach ($escolas as $es)
                    <tr>
                        <td>{{ $es->id }}</td>
                        <td>{{ $es['nome_da_escola'] }}</td>
                        <td>{{ $es['diretor'] }}</td>
                        <td>{{ $es['ViceDiretor'] }}</td>
                        <td>{{ $es['email'] }}</td>

                        <td>
                            <p data-placement='top' data-toggle='tooltip' title='Editar'>
                                <a href="{{url('editarEscola',[$es['id']])}}">
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target='#edit'>
                                        <span class="glyphicon glyphicon-pencil">
                                        </span>
                                    </button>
                                </a>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle='tooltip' title="Deletar">
                                <a href="{{url('deletarEscola',[$es['id']])}}" onclick="return confirm('Voce realmente deseja deletar o usuario ?');"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                        <span class="glyphicon glyphicon-trash">

                                        </span>
                                    </button></a>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Visualizar">
                                <a href="{{route('detalheEscola',[$es['id']])}}"><button class="btn btn-info btn-xs" data-title="Visualizar" data-toggle="modal" data-target="#visualizar">
                                        <span class="glyphicon glyphicon-eye-open">

                                        </span>
                                    </button></a>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $escolas->links() !!}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>