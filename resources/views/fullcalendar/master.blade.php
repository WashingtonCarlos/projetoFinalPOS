<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
  


  <script src="{{url('/fullcalendar/js/calendar.js')}}"></script>
  <script src="{{url('/fullcalendar/js/dataeHora.js')}}"></script>
  <script src="{{url('/fullcalendar/js/script.js')}}"></script>
  <!-- ADIÇÃO DE MASCARA CONFORME A FORMA QUE O BANCO DADOS ACEITA -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.data-hora').mask('0000-00-00 00:00:00');
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <title>Agendamento de Locação</title>
</head>

<body>
      @if(Session::has('status'))
        <div class="alert alert-danger">
            {{Session::get('status')}}
        </div>
      @endif
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Controle de Frota</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;{{auth()->user()->nome}}</a></li>
        <input type="hidden" name="usuario_id" id="usuario_id" value="{{auth()->user()->id}}">
        <li><a href="{{url('/logout')}}"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sair</a></li>
        <li><a href="{{url('senha',[auth()->user()->id])}}"><span class="glyphicon glyphicon-pencil"></span>&nbsp; Alterar senha</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div id='calendar'></div>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#event">
    Launch
  </button>

  <!-- Modal -->
  <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{auth()->user()->nome}} - Secretario Escolar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" style="display:none"></div>
          <form method="" action="" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="">Titulo</label>
              <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" required autofocus>
              <small id="helpId" class="form-text text-muted">Uma breve descrição do que sera realizado</small>
            </div>

            <div class="form-group">
              <label for="">ESCOLAS:</label>
              <select class="form-control" name="nome_da_escola" id="nome_da_escola" required>
                <option selected>Escolher...</option>
                <option value="E. M. Padre Eddie Bernades">E. M. Padre Eddie Bernades</option>
                <option value="E. M. Frei Eugênio">E. M. Frei Eugênio</option>
                <option value="CEMEI Maria Eduarda Farneze">CEMEI Maria Eduarda Farneze</option>
              </select>
            </div>
            <!-- Descrição do transporte -->
            <div class="form-group">
              <label for="">Descrição:</label>
              <textarea class="form-control" name="description" id="description" rows="4" placeholder="Digite aqui a atividade e o local aonde o transportado ira leva-lo" required></textarea>
              <span class="validity"></span>
            </div>
            <!-- Data inical do agendamento do transporte -->
            <div class="form-group">
              <label for="party">inicio do agendamento</label>
              <input type="text" id="start" class="data-hora" name="start" placeholder="Ex: 0000-00-00 00:00:00" required></input>
              <span class="validity"></span><br>
              <small id="helpId" class="form-text text-muted">colocar dessa forma: ANO-MES-DIA HORAS:MINUTOS:SEGUNDOS</small>
            </div>
            <!-- Data final do agendamento do transporte -->
            <div class="form-group">
              <label for="party">fim do agendamento</label>
              <input type="text" id="end" class="data-hora" name="end" placeholder="Ex: 0000-00-00 00:00:00" required></input>
              <span class="validity"></span><br>
              <small id="helpId" class="form-text text-muted">colocar dessa forma: ANO-MES-DIA HORAS:MINUTOS:SEGUNDOS</small>
            </div>

            <div class="form-group">
              <label for="favcolor">Cor: &nbsp;&nbsp;&nbsp;</label>
              <input type="color" id="color" name="color" required>
              <small id="helpId" class="form-text text-muted">Escolha uma cor</small>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="btnSalvar">Salvar</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnAlterar">Alterar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnExcluir">Excluir</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-info" data-dismiss="modal" id="btnPDF">Gerar PDF</button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>