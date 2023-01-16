'use strict'

$(document).ready(()=>{

    $(".check").on("click", idioma);

    function idioma() {
        let id = $(".check")[0].checked;
        if (id == true) {
            location.href = "es/index.html";
        } else {
            location.href = "../index.html";
        }
    }

    let timerInterval;
    let rutaImagen;
    if ($(".check")[0].checked){
        rutaImagen = '../assets/foto4.png';
        $(".es").css('color', '#05F4FE');
        $(".en").css('color', '#015F63');
        $(".h3").css('font-size', '3.5em');
    } else {
        rutaImagen = './assets/foto4.png';
        $(".en").css('color', '#05F4FE');
        $(".es").css('color', '#015F63');
    }
    Swal.fire({
        position: 'bottom-end',
        title: 'Quiero contarte que esta página aún está en proceso de desarrollo.',
        imageUrl: rutaImagen,
        imageWidth: 40,
        imageHeight: 200,
        imageAlt: 'Custom image',
        html: '¡Gracias por tu visita! <b></b>',
        color: '#993',
        background: '#1340',
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Math.round(Swal.getTimerLeft() / 1000, 0) + " segundos."
            }, 1000)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    });

    $('body').on({'mousemove' : function( e ){
        let clientX = e.originalEvent.clientX;
        let clientY = e.originalEvent.clientY;
        $('#cursor').css({
            'left': (clientX - 10) + 'px',
            'top': (clientY - 10) + 'px'
        })
    }});

    $('a').on({
        'mouseover' : function(){
            $('#cursor').addClass('mini');
        },
        'mouseout' : function(){
            $('#cursor').removeClass('mini');
        }
    });

});