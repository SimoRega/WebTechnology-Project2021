$(window).ready(calcolaTotale(),prepareQ());
function calcolaTotale(){
    var a=0;
    $(".prezzo").each(function(){
        var multiplier=parseInt($(this).parents('.d-flex .flex-column').find('.quantity').text());
        a=a+parseInt($(this).text())*multiplier;
    })
    $(".prezzoFinale").text("€"+a);
}
function prepareQ(){
    $(".quantity").each(function(index){
        $(this).attr('id','q'+index);
    })
    $("button[name=minus]").each(function(index){
        $(this).replaceWith('<button type="button" name="minus" class="btn btn-primary btn-sm" onclick="diminuisciQ(q'+index+')">-</button>');
    })
    $("button[name=plus]").each(function(index){
        $(this).replaceWith('<button type="button" name="minus" class="btn btn-primary btn-sm" onclick="aumentaQ(q'+index+')">+</button>');
    })
}
function diminuisciQ(elem){
    var a="#"+elem.id;
    var q=$(a).text();
    if(q>1){
        var newCount = parseInt($(a).text()) - 1;
        $(a).text(newCount);
    }
    calcolaTotale();
}
function aumentaQ(elem){
    var a="#"+elem.id;
    var newCount = parseInt($(a).text()) + 1;
    $(a).text(newCount);
    calcolaTotale();
}