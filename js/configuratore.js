var totPag=0;
var currentPage=0;
var lastPage=0;
var lastPrice=0;
var prezzoTot=0;
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
    prezzoTot=parseInt($("#prezzo").text());
    console.log(prezzoTot);
}

$("button[name=avanti]").click(function(){
    currentPage++;
    $("#"+lastPage).hide();
    lastPage++;
    $("#"+currentPage).show();
    $("button[name=indietro]").removeClass("disabled");
    $( "#stepConfigurazione li" ).removeClass("text-danger");
    $( "#stepConfigurazione li" ).eq( currentPage ).addClass("text-danger");
    lastPrice=0;
    console.log("avanti "+prezzoTot);
    if(currentPage+1>=totPag){
        $("button[name=invia]").removeClass("disabled");
        $(this).addClass("disabled");
    }
});

$("button[name=indietro]").click(function(){
    currentPage--;
    $("#"+lastPage).hide();
    lastPage--;
    $("#"+currentPage).show();
    $("button[name=avanti]").removeClass("disabled");

    $( "#stepConfigurazione li" ).removeClass("text-danger");
    $( "#stepConfigurazione li" ).eq( currentPage ).addClass("text-danger");
    $("button[name=invia]").addClass("disabled");

    if(currentPage==0){
        $(this).addClass("disabled");
    }
});

$('.inputprezzo').click(function(){
    prezzoTot-=lastPrice;
    var costo= parseInt($(this).next().find('small').text());
    lastPrice=costo;

    prezzoTot+=costo;
    $("#prezzo").text(prezzoTot);
    
    $("#ip").val(""+prezzoTot);

});
