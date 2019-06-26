
$(function() {

    $("#non").click(function() {
        $("#Adresse").show();
        $("#typedebourse").hide();
        $("#batiment").hide();
        $("#chambre").hide();

    });
    $("#boursier").click(function() {
        $("#Adresse").hide();
        $("#typedebourse").show();
        $("#batiment").hide();
        $("#chambre").hide();
    });
    $("#loge").click(function() {
        $("#Adresse").hide();
        $("#typedebourse").show();
        $("#chambre").show();




    });

});
     