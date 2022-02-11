var totPag=0;
var currentPage=0;
var lastPrice=0;
$(document).ready(inizializeConfiguratore());


function inizializeConfiguratore(){
    console.log("ciao");
    $(".sceltaConfiguratore").each(function(index){
        $(this).attr('id', index);
        $(this).toggle();
        console.log(index);
        totPag=totPag+1;
    })

    $("#0").show();
    $( "#stepConfigurazione li" ).eq( currentPage ).addClass("text-danger");
    $("button[name=invia]").addClass("disabled");
    $("button[name=indietro]").addClass("disabled");
}

$("button[name=avanti]").click(function(){
    if(currentPage!==totPag){
        $("#"+currentPage).hide();
        currentPage++;
        $("#"+currentPage).show();
        $("button[name=indietro]").removeClass("disabled");

        $( "#stepConfigurazione li" ).removeClass("text-danger");
        $( "#stepConfigurazione li" ).eq( currentPage ).addClass("text-danger");
    }else{
        $("button[name=invia]").removeClass("disabled");
        $(this).addClass("disabled");
    
    }
});

$("button[name=indietro]").click(function(){
    if(currentPage>0){
        $("#"+currentPage).hide();
        currentPage--;
        $("#"+currentPage).show();
        $("button[name=avanti]").removeClass("disabled");

        $( "#stepConfigurazione li" ).removeClass("text-danger");
        $( "#stepConfigurazione li" ).eq( currentPage ).addClass("text-danger");
        $("button[name=invia]").addClass("disabled");
    }else{
        $(this).addClass("disabled");
    }
});


function aggiungiPrezzo(){
    var costo= $('input[name="color"]:checked small').text();
    alert(costo);

}