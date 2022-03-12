document.addEventListener('DOMContentLoaded', function() {
  
  let formulario = document.querySelector("form");
  
  var calendarEl = document.getElementById('calendar');
  //filtra o id do usuario que faz o login
  var filtro = $('#usuario_id').val();
  
  var calendar = new FullCalendar.Calendar(calendarEl, {
    
    initialView: 'dayGridMonth',
    locale:"pt-br",

    headerToolbar: {
      left:'prev,next today',
      center:'title',
      right: 'dayGridMonth,timeGridWeek,listWeek'
    },

    editable: true,

    //eventos separado por usuarios logados 
    events: { 
      url: "/load-events/"+filtro,
      type: 'GET',
      error: function(){
        alert ('Erro ao buscar o Calendario');
      }
    },
    //pega a data do calendario conforme o dia que clicar
    dateClick:function(info){
      formulario.reset();
      formulario.start.value = info.dateStr;
      formulario.end.value = info.dateStr;
      limparFormulario();  
      $("#event").modal("show");
    },

    eventClick:function(info){

      var event = info.event;
      //console.log(event);
      //captura dos elementos do banco 
      $('#title').html(event.title);
      $('#description').html(event.description);
      $('#nome_da_escola').html(event.nome_da_escola);
      $('#color').html(event.color);
      $('#start').html(event.start);
      $('#end').html(event.end);
      //mostrar os dados dos eventos nos seu respectivos campos
      $('#id').val(info.event.id);
      $('#title').val(info.event.title);
      $('#description').val(info.event.extendedProps.description);
      $('#nome_da_escola').val(info.event.extendedProps.nome_da_escola);
      $('#color').val(info.event.backgroundColor);
      $('#start').val(moment(info.event.start).format("YYYY-MM-DD HH:mm"));
      $('#end').val(moment(info.event.end).format("YYYY-MM-DD HH:mm"));
      $('#event').modal();

    },
    //alterar o dia do evento conforme voce vai alterando na data 
    eventResize:function(info){
      
      $('#id').val(info.event.id);
      $('#title').val(info.event.title);
      $('#description').val(info.event.extendedProps.description);
      $('#nome_da_escola').val(info.event.extendedProps.nome_da_escola);
      $('#color').val(info.event.backgroundColor);
      $('#start').val(moment(info.event.start).format("YYYY-MM-DD HH:mm"));
      $('#end').val(moment(info.event.end).format("YYYY-MM-DD HH:mm"));
      let dados = recuperarDadosDoFormulario();
      modificarDados(dados);

    }

  });
  //rederizando o calendario
  calendar.render();

  //codigo para salvar no banco de dados
  $(document).ready(function() {

    $('#btnSalvar').click(function(e) {

      e.preventDefault();

      let dados = {
        usuario_id: $('#usuario_id').val(),
        escola_id: $('#escola_id').val(),
        title: $('#title').val(),
        description: $('#description').val(),
        nome_da_escola: $('#nome_da_escola').val(),
        color: $('#color').val(),
        start: $('#start').val(),
        end: $('#end').val(),
        _token: $('#token').val()
      };
      console.log(dados);
      $.ajax({
        
        url: "usuario/armazena",
        method: "POST",
        dataType: 'json',
        data: dados,
        
        success: function(result) {
  
          if (result.errors){

            alert("A um problema na atualização "+result.errors);
            console.log(filtro);
            $.each(result.errors, function(key, value) {

              $('.alert-danger').show();
              $('.alert-danger').append('<li>' + value + '</li>');

            });
          } else{

            alert("Atualizado com sucesso: "+dados.nome_da_escola);
            calendar.refetchEvents();
          }
        }
      });
    });
  });

  function recuperarDadosDoFormulario() {

    let dados = {
      usuario_id: $('#usuario_id').val(),
      escola_id: $('#escola_id').val(),
      id: $('#id').val(),
      title: $('#title').val(),
      description: $('#description').val(),
      nome_da_escola: $('#nome_da_escola').val(),
      color: $('#color').val(),
      start: $('#start').val(),
      end: $('#end').val()
    };
    return dados;
  }

  $('#btnAlterar').click(function(e){
    e.preventDefault();
  
    let dados = {
      usuario_id: $('#usuario_id').val(),
      escola_id: $('#escola_id').val(),
      id: $('#id').val(),
      title: $('#title').val(),
      description: $('#description').val(),
      nome_da_escola: $('#nome_da_escola').val(),
      color: $('#color').val(),
      start: $('#start').val(),
      end: $('#end').val(),
      _token: $('#token').val()
    };

    $.ajax({
        type: 'POST',
        url: "/load-update/"+dados.id,
        dataType: 'json',
        data: dados,
        success: function(result) {
  
          if (result.errors){

            alert("A um problema na atualização "+result.errors);
            $.each(result.errors, function(key, value) {

              $('.alert-danger').show();
              $('.alert-danger').append('<li>' + value + '</li>');

            });
          } else{

            alert("Armazenado com sucesso: "+dados.nome_da_escola);
            calendar.refetchEvents();
          }
        }
      });
  });

  $('#btnExcluir').click(function(e){
    e.preventDefault();
  
    let dados = {
      id: $('#id').val(),
      _token: $('#token').val()
    };
    confirm("Deseja realmente excluir ??");
    $.ajax({
        type: 'DELETE',
        url: "/excluir/"+dados.id,
        dataType: 'json',
        data: dados,
        success: function(msg) {
          alert("Excluido com sucesso: "+dados.nome_da_escola);
          calendar.refetchEvents();
        },
        error: function(error) {
          alert("A um problema na exclusão !!! "+error);
        }
      });
  });

  function limparFormulario(){

    $('#id').val('');
    $('#title').val('');
    $('#description').val('');
    $('#nome_da_escola').val('');
    $('#color').val('#3788D8');

  }

  $('#btnPDF').click(function(e){
    e.preventDefault();

    let dados = {
      id: $('#id').val(),
      _token: $('#token').val()
    };
    $.ajax({
      type: 'GET',
      url: '/gerarPDF/'+ dados.id,
      dataType: 'json',
      data: dados,
      success: function(url){
        window.open("http://frotauberaba.dev.br/gerarPDF/"+dados.id,"_blank");
        calendar.refetchEvents();
      },
      error: function(error){
        window.open("http://frotauberaba.dev.br/gerarPDF/"+dados.id,"_blank");
        calendar.refetchEvents();
      }
    });
  });

});


