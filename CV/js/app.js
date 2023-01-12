'use strict'

$(document).ready(()=>{

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