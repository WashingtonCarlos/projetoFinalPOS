<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    @foreach ($dados as $dado)
<<<<<<< HEAD
    <h1>{{$dado->nome_da_escola}}</h1>
=======
        @foreach ($dados2 as $dado2)
        @if ($dado->escola_id == $dado2->id)
        <h1>{{$dado2->nome_da_escola}}</h1>
        @endif
        @endforeach
>>>>>>> 0e8546bc56e4d53724e746addf26dea24183e6dd
    <br>
    <h3><label for="inputDados">Local de destino</label></h3>
    <br>
    <input class="" type="text" value="{{$dado->title}}">
    <br>
    <h3><label for="inputDados">Descrição do destino</label></h3>
    <br>
    <textarea name="dados" id="texto" rows="4">{{$dado->description}}</textarea>
    <br>
    <h3><label for="inputDados">Data e Hora inicial</label></h3>
    <br>
<<<<<<< HEAD
    <input class="" type="text" value="{{$dado->start}}">
    <br>
    <h3><label for="inputDados">Data e Hora final</label></h3>
    <br>
    <input class="" type="text" value="{{$dado->end}}">
=======
    <input class="" type="text" value="{{\Carbon\Carbon::parse($dado->start)->format('d/m/Y H:i:s')}}">
    <br>
    <h3><label for="inputDados">Data e Hora final</label></h3>
    <br>
    <input class="" type="text" value="{{\Carbon\Carbon::parse($dado->end)->format('d/m/Y H:i:s')}}">
>>>>>>> 0e8546bc56e4d53724e746addf26dea24183e6dd
    @endforeach
</body>
</html>