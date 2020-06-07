$(document).ready(function () {
    let offset = 0;
    var teste = 0;
    const tbody = $('#tbody');
    $.ajax({
        type: "POST",
        url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
        data: {limit: 5, offset: offset, teste: teste},
        dataType: 'JSON',
        success: function (data) {
            if ($.trim(data)) {
                tbody.html('');
                printData(data, tbody);
                offset += 5;
            } else console.log(data);
        }
    });
    $("#next").click(function () {
        var teste = 0;
        $.ajax({
            type: "POST",
            url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
            data: {limit: 5, offset: offset, teste: teste},
            dataType: 'JSON',
            success: function (data) {
                tbody.html('');
                printData(data, tbody);
                offset += 5;
            }
        });
    });
    $("#precedent").click(function () {
        //la variable teste permet d'eèxecuté deux un sql selons la valeur de teste
        var teste = 1;
        $.ajax({
            type: "POST",
            url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
            data: {limit: 5, offset: offset, teste: teste},
            dataType: 'JSON',
            success: function (data) {
                if ($.trim(data)) {
                    tbody.html('');
                    printData(data, tbody);
                    offset -= 5;
                } else console.log(data);
            }
        });
    });

    function printData(data, tbody) {
        $.each(data, function (indice, user) {
            if (user.verrou == 0) {
                tbody.append(`
             <tr class="text-center">
                 <td id="user_id">${user.id}</td>
                 <td >${user.prenom}</td>
                 <td >${user.nom}</td>
                 <td >${user.score}</td>
                 <td >
                    <img src="../../../assets/Images/user/${user.image}" class="rounded-circle " alt=""
                      width="50" height="50">
                 </td>
                 <td><button id="btnSelect" class="btn btn-sm mauve"><i id="icon" class="fa fa-unlock" style="color: white"></i></button></td>
             </tr>
         `);

            } else {
                tbody.append(`
             <tr class="text-center">
                 <td id="user_id">${user.id}</td>
                 <td >${user.prenom}</td>
                 <td >${user.nom}</td>
                 <td >${user.score}</td>
                 <td >
                    <img src="../../../assets/Images/user/${user.image}" class="rounded-circle " alt=""
                      width="50" height="50">
                 </td>
                 <td><button id="btnSelect" class="btn btn-sm mauve"><i id="icon" class="fa fa-lock" style="color: red"></i></button></td>
             </tr>
         `);
            }


        });
    }
});
//scloll
/**        //  Scroll
 const scrollZone = $('#scrollZone')
 scrollZone.scroll(function(){
            //console.log(scrollZone[0].clientHeight)
            const st = scrollZone[0].scrollTop;
            const sh = scrollZone[0].scrollHeight;
            const ch = scrollZone[0].clientHeight;

            console.log(st,sh, ch);

            if(sh-st <= ch){
                $.ajax({
                    type: "POST",
                    url: "http://localhost/LIVE_AJAX/data/getVentes.php",
                    data: {limit:7,offset:offset,date:date},
                    dataType: "JSON",
                    success: function (data) {
                        printData(data,tbody);
                        offset +=7;
                    }
                });
            }
        })*/


// verrou joueur
$(document).ready(function () {
    $("#resultat").hide(1);
    $("#tbody").on('click', '#btnSelect', function () {
        if (confirm('Êtes-vous sûr?')) {
            // recupération de la valeur d'un td
            var td = $(this).closest("tr");
            var id = td.find("#user_id").html(); // get current row 1st table cell TD value
            // alert(id);
            $.ajax({
                type: "POST",
                url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
                data: {id: id},
                dataType: 'JSON',
                success: function (data) {
                    if ($.trim(data)) {
                        if (data ==1){
                            $("#resultat").html("le joueur a été verrouillé!")
                                .fadeIn().delay(2000).fadeOut();
                        }
                        else{
                            $("#resultat").html("le joueur a été déverrouillé!")
                                .fadeIn().delay(2000).fadeOut();
                        }
                    }
                },
                error: function () {
                    console.log('erreur lors de l\'envoie des donnée  ajax');
                }
            });
        }

    });
});