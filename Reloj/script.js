//para mostrar siempre datos de dos cifras
function ceros(tiempo) {
    if(tiempo.toString().length == 1){
        return '0' + tiempo;
    } else {
        return tiempo
    }
}

function mostrarReloj(){
    let fecha = new Date();
    let hora = ceros(fecha.getHours());
    let minutos = ceros(fecha.getMinutes());
    let segundos = ceros(fecha.getSeconds());
    document.getElementById('hrs').innerHTML = hora;
    document.getElementById('min').innerHTML = minutos;
    document.getElementById('sec').innerHTML = segundos;
}
mostrarReloj();
setInterval(mostrarReloj,1000);