<div class="container mt-4 ml-xl-5 justify-content-center ">
    <form class="scrollADD">
        <!--question-->
        <div class="form-group row">
            <label for="question" class="col-sm-2 mauve text-center text-white h4-responsive py-3">Question</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control-lg mauve text-white" id="question"
                          placeholder="Question"></textarea>
            </div>
        </div>
        <!--question-->

        <!--points-->
        <div class="form-group row">
            <label for="point" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Nbre Points</label>
            <div class="col-md-2">
                <input type="number" class="form-control-lg mauve text-white" id="point" placeholder="nbre points">
            </div>
        </div>
        <!--points-->

        <!--type de choix-->
        <div class="form-group row">
            <label class="col-sm-2 mr-3 text-center text-white h4-responsive py-1 mauve ml-1" for="select">Type
                Réponse</label>
            <select name="select" id="select" class="custom-select-lg col-4 py-1 text-white mr-3"
                    style="background-color: #D96BCE">
                <option selected>Type de Réponse</option>
                <option value="multiple">Multiple</option>
                <option value="simple">Simple</option>
                <option value="texte">Texte</option>
            </select>
            <div class="col-2">
                <div class="col-2 mt-n1 ml-xl-5">
                    <button class="btn bleu" id="addInput">add</button>
                </div>
            </div>
        </div>
        <!--type de choix-->
        <div class="container" id="contentReponse">


        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {

        $("#addInput").click(function (e) {
            e.preventDefault();
            let select = $("#select").val();

            switch (select) {
                case "simple":
                    $("#contentReponse").append(`
             <div class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse 2</label>
                <div class="col-md-1">
                    <input type="radio" class=" checkbox mauve py-3 text-white" id="checbox">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control-lg mauve ml-n1 text-white" id="reponse"
                           placeholder="Réponse fii">
                </div>
                <div class="col-2 mt-n1">
                    <div class="col-2">
                        <button class="btn bleu  "><i class=" fa fa-trash" style="color: red"></i></button>
                    </div>
                </div>
            </div>
            `); //add input box
                    break;

                case "multiple":
                    $("#contentReponse").append(`
             <div class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse 2</label>
                <div class="col-md-1">
                    <input type="checkbox" class=" checkbox mauve py-3 text-white" id="checbox">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control-lg mauve ml-n1 text-white" id="reponse"
                           placeholder="Réponse fii">
                </div>
                <div class="col-2 mt-n1">
                    <div class="col-2">
                        <button class="btn bleu  "><i class=" fa fa-trash" style="color: red"></i></button>
                    </div>
                </div>
            </div>
            `); //add input box
                    break;
                case "texte":
                    $("#contentReponse").append(`
           <div class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse</label>
               <div class="col-md-6">
                 <textarea type="text" class="form-control-lg mauve text-white" id="reponse"
                  placeholder="Réponse fii"></textarea>
               </div>
          </div>`);

                    break;
                default:
                    alert('selectionner le type de reponse')

            }


        });
    });

</script>

