function dataformatada() {
    var hoje = new Date();
    var dd = hoje.getDate();
    var mm = hoje.getMonth()+1;
    var aaaa = hoje.getFullYear();
    var horas = hoje.getHours();
    var minutos = hoje.getMinutes();
    var segundos = hoje.getSeconds();
        if(dd<10){dd='0'+dd}
        if(mm<10){mm='0'+mm}
        if(horas<10){horas='0'+horas}
        if(minutos<10){minutos='0'+minutos}
        if(segundos<10){segundos='0'+segundos}
    return aaaa +'-'+ mm +'-'+ dd +' '+ horas +':'+ minutos +':'+ segundos;
}

function aplicahoras() {
debugger;
var campos = document.getElementsByClassName('data-hora'),
    i = campos.length;

while(i < campos.length ) {
    campos[i].value = dataformatada();
}
}