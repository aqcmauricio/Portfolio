'use strict'

$(document).ready(()=>{
    let timerInterval;
    Swal.fire({
        position: 'bottom-end',
        title: 'Quiero contarte que esta página aún está en proceso de desarrollo.',
        imageUrl: './assets/foto4.png',
        imageWidth: 40,
        imageHeight: 200,
        imageAlt: 'Custom image',
        html: '¡Gracias por tu visita! <b></b> segundos.',
        color: '#993',
        background: '#1340',
        timer: 10000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Math.round(Swal.getTimerLeft() / 1000,0)
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