// ajout des inputes
$(document).ready(function (e) {
    var indice = 0;
    const content = $("#contentReponse");
    $("#addInput").click(function (e) {
        e.preventDefault();
        let select = $("#select").val();
        switch (select) {
            case "simple":
                indice++;
                content.append(`
             <div id="reponse" class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse${indice}</label>
                <div class="col-md-1">
                    <input type="radio" class=" radio checkbox mauve py-3 text-white" name="radio" value="${indice}" >
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control-lg mauve ml-n1 text-white" id="reponse${indice}"
                           placeholder="Votre réponse" name="reponse${indice}">
                </div>
                <div class="col-2 mt-n1">
                    <div class="col-2">
                        <button class="btn bleu " name="delete" id="delete"><i class=" fa fa-trash" style="color: red"></i></button>
                    </div>
                </div>
            </div>
            `);
                break;
            case "multiple":
                indice++;
                content.append(`
             <div id="reponse" class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse${indice}</label>
                <div class="col-md-1">
                    <input type="checkbox" class="checkbox mauve py-3 text-white" id="checkbox"  name="checkbox[]" value="${indice}">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control-lg mauve ml-n1 text-white" name="reponse${indice}" id="reponse${indice}"
                           placeholder="Votre réponse">
                </div>
                <div class="col-2 mt-n1">
                    <div class="col-2">
                     <button class="btn bleu " name="delete" id="delete"><i class=" fa fa-trash" style="color: red"></i></button>
                    </div>
                </div>
            </div>
            `); //add input box
                break;
            case "texte":
                if (indice===0){
                    content.append(`
           <div class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse</label>
               <div class="col-md-6">
                 <textarea type="text" class="form-control-lg mauve text-white" id="texte"
                  placeholder="Réponse fii" name="texte"></textarea>
               </div>
          </div>`);
                }
         indice++;
                break;
            default:
                alert('selectionner le type de reponse')
        }
    });
    content.on("click", '#delete', function () {
        $(this).closest('#reponse').remove();
        //  $(this).closest('#inputFormRow').remove();
    });
});
//envoie des donnée au niveau du serveur
$(document).ready(function () {
    $("#addQuestion").click(function (e) {
        e.preventDefault();
        var question = $('#question').val();
        var point = $('#point').val();
        var type = $('#select').val();
        if (question === "") {
            $("#question-error").html("Veuillez saisir la question!")
                .fadeIn().delay(2000).fadeOut();
            console.log('question vide');
        } else if (point == "" || point < 10) {
            $("#point-error").html("Veuillez saisir un nombre  supérieur ou égal à 10 !")
                .fadeIn().delay(2000).fadeOut();
        } else if (type != "simple" && type != "multiple" && type != "texte") {
            $("#select-error").html("Veuillez selectionner le type de réponse !")
                .fadeIn().delay(2000).fadeOut();
        } else {
            var data = $("#myForm").serialize();
            //   alert(data);
            $.ajax({
                url: 'http://localhost/mini-projetDB/src/controller/newQuestionController.php',
                type: "POST",
                dataType: 'text',
                data: data,
                success: function (data) {
                    console.log(data);
                    if (data==1){
                        $('#myForm')[0].reset();
                        $("#contentReponse").html("");
                        $("#message").append(`
                                <span class='alert alert-success mb-4 container-fluid'>
                                 la question a  été bien ajoutée à la base de donnée
                                </span>`)
                            .fadeIn().delay(2000).fadeOut();
                        setTimeout(function () {
                            window.location.href = "admin.php";
                        }, 1000);
                        console.log('success');
                    }
                  else if (data == "not check") {
                        $("#message-error").html("Veuillez saisir  la reponse !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('choisisez une reponse');
                    } else if (data == "check vide") {
                        $("#message-error").html("Veuillez choisir la  reponse !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('choisisez la bonne  reponse')
                    } else if (data == "au moins deux réponse") {
                        $("#message-error").html("Veuillez choisir au moins deux reponse !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('Veuillez choisir au moins deux reponse ')
                    } else if (data == "au moins deux reponses") {
                        $("#message-error").html("Veuillez cochez au moins deux reponse !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('Veuillez cochez au moins deux reponse !')
                    } else if (data == "pas de réponse") {
                        $("#message-error").html(" Veuillez ajoutez au moins 3 réponse3  !")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('Veuillez ajoutez au moins 3 réponse   !')
                    }
                    else if (data == "3 question") {
                        $("#message-error").html("Veuillez ajoutez au moins 3 réponses!")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('Veuillez ajoutez au moins 3 réponse   !')
                    }
                    else if (data == "ajouter une reponse") {
                        $("#message-error").html("Veuillez ajouter une reponse!")
                            .fadeIn().delay(2000).fadeOut();
                        console.log('ajouter une reponse   !')
                    }
                },
                error: function (data) {
                    $("#message-error").html("Erreur lors de la traitement des donnée")
                        .fadeIn().delay(2000).fadeOut();
                    console.log(data);
                    console.log('error lors de l\'encvoie des donnée')
                }
            });
        }
    });
    indice = 0;
});
