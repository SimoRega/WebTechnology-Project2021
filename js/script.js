$(document).ready(navBarScroll());


//Funzione per la transizione della navbar
function navBarScroll(){
    var bodyStyle= window.getComputedStyle(document.body);
    var bgColor=bodyStyle.getPropertyValue('--main-bg-color');

    var lastPos=0;
    $(window).scroll(function(){
        if($(window).scrollTop()<lastPos && $(window).scrollTop()>400){
            var myStyle={
                'background-color':'transparent',
                'visibility':'hidden'
            }
            $("#myNav").css(myStyle);
        }else{
            if($(window).scrollTop()>400 ){
                var myStyle={
                    'background-color': bgColor,
                    'transition':  'all 0.6s ease',
                    'visibility':'visible'
                }
                $("#myNav").css(myStyle);
                $("#myNav").addClass("fixed-top");
            }
            if($(window).scrollTop()<200){
                var myStyle={
                    'visibility':'visible'
                }
                $("#myNav").css(myStyle);
                $("#myNav").removeClass("fixed-top");
            }
        }
        
        lastPos=$(window).scrollTop();
    });
}



