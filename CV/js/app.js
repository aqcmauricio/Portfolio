'use strict'

$(document).ready(()=>{
    Swal.fire({
        title: 'Quiero contarte que esta página aún está en desarrollo.',
        text: '¡Gracias por tu visita!',
        imageUrl: './assets/foto.png',
        imageWidth: 200,
        imageHeight: 250,
        imageAlt: 'Custom image',
    });
    $('body').on({'mousemove' : function( e ){
        let clientX = e.originalEvent.clientX;
        let clientY = e.originalEvent.clientY;
        $('#cursor').css({
            'left': (clientX - 10) + 'px',
            'top': (clientY - 10) + 'px'
        })
    }})

    $('a').on({
        'mouseover' : function(){
            $('#cursor').addClass('mini');
        },
        'mouseout' : function(){
            $('#cursor').removeClass('mini');
        }
    })
})