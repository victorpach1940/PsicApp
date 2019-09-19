(function(){
  var actualizarHora = function(){
    var fecha = new Date(),
    horas = fecha.getHours(),
    ampm,
    minutos = fecha.getMinutes(),
    segundos = fecha.getSeconds();
    if(horas >=12){
      horas = horas-12;
      ampm='pm';
    }else{
      ampm='am';
    }
    if(horas==0){
      horas = 12;
    }
  };
  actualizarHora();
  var intervalo = setInterval(actualizarHora, 1000);
}())
