$(document).ready(function () {
    //alert('magui si biir');
    let offset = 0;
    var teste = 0;
    const tContent = $('#tContent');
    $.ajax({
        type: "POST",
        url: "http://localhost/mini-projetDB/src/controller/listeQuestionController.php",
        data: {limit: 5, offset: offset, teste: teste},
        dataType: 'json',
        success: function (data) {

            if ($.trim(data)) {
                console.log('success');

                console.log(data);
                tContent.html('');
                printData(data, tContent);
                offset += 5;
            } else console.log(data);
        },
        error: function (data) {
            console.log('erreur');
            console.log(data)
        }
    });
    function printData(data, tContent) {
        var reponseVrais= [];
        $.each(data, function (indice, questions) {
            var nombre = questions.reponses.length;
            var element =` <tr id="${questions.id}">
               
                <td id="question_id">${questions.question}</td>
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
               '   <button id="edit" class="btn mauve"><i class="fa fa-eye " style="color: white"></i></button>\n' +
               '   <button id="delete" class="btn mauve"><i class="fa fa-trash" style="color: white"></i></button>\n' +
               ' </td> ' +
               '</tr>';
            tContent.append(element);
        });
    }
   tContent
        .on('click', 'button',function () {
            var option = $(this).attr('id');
           var id= $(this).parents('tr').attr('id');
            //alert(id);
            //console.log(tab);
            if (option==="delete"){
                if (confirm("Voulez-Vous supprimer cette question?")){
                    $(this).parents('tr').hide();
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/mini-projetDB/src/controller/listeQuestionController.php",
                        data: {idDelete: id},
                        dataType: 'text',
                        success: function (data) {
                            if (data=="success"){
                                console.log('success');
                            }
                            else{
                                console.log('errreur lors de la supprésion');
                                console.log(data);
                            }
                        },
                        error: function (data) {
                            console.log('erreur  traitement de donnée');
                            console.log(data)
                        }
                    });
                }
            }
            else
            {
                console.log('tay ma defar  la dé')
            }
        });
    //scloll
    //  Scroll
    const scrollZone = $('.listQuestionScroll');
    scrollZone.scroll(function(){
        console.log(scrollZone[0].clientHeight);
        const st = scrollZone[0].scrollTop;
        const sh = scrollZone[0].scrollHeight;
        const ch = scrollZone[0].clientHeight;

       // console.log('scrolltop: '+st+ 'scrollhieit: '+ sh+ 'scrollZone: '+  ch);

        if(sh-st <= ch){
            $.ajax({
                type: "POST",
                url: "http://localhost/mini-projetDB/src/controller/listeQuestionController.php",
                data: {limit: 5, offset: offset, teste: teste},
                dataType: 'json',
                success: function (data) {
                    if ($.trim(data)) {
                        console.log('success');
                        console.log(data);
                        printData(data, tContent);
                        offset += 5;
                    } else console.log(data);
                },
                error: function (data) {
                    console.log('erreur');
                    console.log(data)
                }
            });

        }

    });
});

