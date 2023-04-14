<!DOCTYPE html>
<html lang="pt-BR">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Bootstrap para cadastro ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Cadastro Escola</title>
</head>

<body>
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

        <form class="col-md-12" method="POST" action="{{url('/registrarEscola')}}">
            {{csrf_field()}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome_da_escola">Nome da Escola</label>
                    <input type="text" class="form-control @error('nome_da_escola') is-invalid @enderror" placeholder="Nome da Escola do Municipio" name="nome_da_escola" id="nome_da_escola">
                    @error('nome_da_escola')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputDiretor">Diretor(a) da Escola</label>
                    <input type="text" class="form-control @error('diretor') is-invalid @enderror" name="diretor" id="diretor" placeholder="Diretor(a) da Escola">
                    @error('diretor')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputViceDiretor">Vice-Diretor(a) da Escola</label>
                    <input type="text" class="form-control @error('ViceDiretor') is-invalid @enderror" name="ViceDiretor" id="ViceDiretor" placeholder="ViceDiretor(a) da Escola">
                    @error('ViceDiretor')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Email da Escola</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Email da Escola">
                @error('email')
                <div class="invalid-feedback alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" id="endereco" placeholder="Apartamento, hotel, casa, etc.">
                @error('endereco')
                <div class="invalid-feedback alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
                <div class="form-group col-md-3">
                    <label for="inputTEL">telefone</label>
                    <input class="form-control @error('telefone') is-invalid @enderror" type="text" id="telefone" name="telefone">
                    @error('telefone')
                    <div class="invalid-feedback alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            <div class="form-group col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-primary col-md-4">Salvar</button>
            </div>
        </form>
    </div>
</body>

</html>