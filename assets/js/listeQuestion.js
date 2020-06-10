$(document).ready(function () {
    let offset = 0;
    var teste = 0;
    const tContent = $('#tContent');
    $.ajax({
        type: "POST",
        url: "http://localhost/mini-projetDB/src/controller/listeQuestionController.php",
        data: {limit: 5, offset: offset, teste: teste},
        dataType: 'JSON',
        success: function (data) {
            console.log(data);
            if ($.trim(data)) {
                tContent.html('');
                printData(data, tContent);
                offset += 5;
            } else console.log(data);
        }
    });
    function printData(data, tContent) {
        var reponseVrais= [];
        $.each(data, function (indice, questions) {
            var nombre = questions.reponses.length;
            var element =` <tr class="">
                 <td id="user_id">${questions.question}</td>
                 <td >${questions.point} pts</td>
                 <td >${questions.type}</td>
                 <td > ${nombre} reponse</td><td> `;
              $.each(questions.reponses, function(indice,reponses){
              if(reponses.etat==1){
                  element += `${reponses.reponse} `
              }
            });
           element += '  </td> ' +
               '  <td class="border-right mr-4 border-primary justify-content-sm-center">\n' +
               '   <button class="btn mauve"><i class="fa fa-eye " style="color: white"></i></button>\n' +
               '   <button class="btn mauve"><i class="fa fa-trash" style="color: white"></i></button>\n' +
               ' </td> ' +
               '</tr>';

            tContent.append(element);
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