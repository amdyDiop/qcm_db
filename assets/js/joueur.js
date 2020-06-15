$().ready( ()=>{
    var content = $('#tabJoueur');
    $("#navbar").on('click','button',function (e) {
        var id = $(this).attr('id');
        if (id === "top"){
            content.html("");
            content.load("topScore.php "); // un élément portant l'id "content" existe dans contenu.html
            $('#top').css("background-color", "#34BBE6");
            $("#score").css("background-color", "#D96BCE");

        }
        else {
            content.html("");
            content.load("historique.php "); // un élément portant l'id "content" existe dans contenu.html
            $("#score").css("background-color", "#34BBE6");
            $("#top").css("background-color", "#D96BCE");
        }
    } );

});
