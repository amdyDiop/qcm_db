<div class="container mt-4 ml-xl-5 justify-content-center">
    <form>
        <div class="form-group row">
            <label for="question" class="col-sm-2 mauve text-center text-white h4-responsive py-3">Question</label>
            <div class="col-sm-6">
                <textarea type="text" class="form-control-lg mauve text-white" id="question"
                          placeholder="Question"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="point" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Nbre Points</label>
            <div class="col-md-2">
                <input type="number" class="form-control-lg mauve text-white" id="point" placeholder="nbre points">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 mr-3 text-center text-white h4-responsive py-1 mauve ml-1"  for="select">Type
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
                    <button class="btn bleu "><i class=" fa fa-plus " style="color: white"></i></button>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse 1</label>
            <div class="col-md-1">
                <input type="checkbox" class=" checkbox mauve py-3 text-white" id="checbox">
            </div>
            <div class="col-4">
                <input type="text" class="form-control-lg mauve ml-n1 text-white" id="reponse"
                       placeholder="Réponse fii">
            </div>
            <div class="col-2">
                <div class="col-2 mt-n1">
                    <button class="btn bleu ml-n1"><i class=" fa fa-trash" style="color: red"></i></button>
                </div>
            </div>
        </div>
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
            <div class="form-group row">
                <label for="reponse" class="col-sm-2  mauve text-center text-white h4-responsive py-1">Réponse</label>
                <div class="col-md-6">
                    <textarea type="text" class="form-control-lg mauve text-white" id="reponse"
                              placeholder="Réponse fii"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Créer</button>
                </div>
            </div>
    </form>
</div>
<script>
    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').materialSelect();
    });
</script>

