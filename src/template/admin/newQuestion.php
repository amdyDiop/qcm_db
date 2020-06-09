<div class="container mt-4 ml-xl-5 justify-content-center ">
    <div id="message"></div>
    <form id="myForm" class="scrollADD" method="post">
        <!--question-->
        <div class="form-group row">
            <label for="question" class="col-sm-2 mauve text-center text-white h4-responsive py-3">Question</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control-lg mauve text-white" id="question"
                          placeholder="Question" name="question"></textarea>
                <div class="error" id="question-error"></div>
            </div>
        </div>
        <!--question-->

        <!--points-->
        <div class="form-group row">
            <label for="point" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Nbre Points</label>
            <div class="col-md-2">
                <input type="number" name="point" class="form-control-lg mauve text-white" id="point"
                       placeholder="nbre points">
                <div class="error" id="point-error"></div>

            </div>
        </div>
        <!--points-->

        <!--type de choix-->
        <div class="form-group row">
            <label class="col-sm-2 mr-3 text-center text-white h4-responsive py-1 mauve ml-1" for="select">Type
                Réponse</label>
            <select name="type" id="select" class="custom-select-lg col-4 py-1 text-white mr-3"
                    style="background-color: #D96BCE">
                <option selected>Type de Réponse</option>
                <option value="multiple">Multiple</option>
                <option value="simple">Simple</option>
                <option value="texte">Texte</option>
            </select>
            <div class="error" id="select-error"></div>

            <div class="col-2">
                <div class="col-2 mt-n1 ml-xl-5">
                    <button class="btn bleu" id="addInput">add</button>
                </div>
            </div>
        </div>
        <!--type de choix-->
        <div class="container" id="contentReponse">

        </div>
        <div class="error" id="message-error"></div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button id="addQuestion" class="btn btn-primary">Créer</button>
            </div>
        </div>
    </form>
</div>
<script src="../../../assets/js/addQuestion.js"></script>

