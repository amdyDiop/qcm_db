<div class="card col-10 bg-primary border-primary">
    <table class="table table-bordered table-hover text-center mt-1 ">
        <thead class="bleu">
        <tr>
            <th scope="col-3">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Sore</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
<div class="card col-2 bg-primary border-primary ">
    <div id="next" class="row justify-content-center pt-4 mb-5 mt-4 ">
        <input class="button mt-4  roundButton" type="submit" value=">">
    </div>
    <div class="row justify-content-center pt-4 mt-5">
        <button id="precedent" class="button mt-4 roundButton" type="button"><</button>
    </div>
</div>

<script>
    $(document).ready(function () {
        //  alert('magui si axaj bi booy ');
        let offset = 0;
        var teste =0;
        const tbody = $('#tbody');
        $.ajax({
            type: "POST",
            url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
            data: {limit: 5, offset: offset, teste:teste},
            dataType: 'JSON',
            success: function (data) {
                if ($.trim(data)){
                    tbody.html('');
                    console.log(data);
                    printData(data, tbody);
                    offset += 5;
                }
                else console.log(data);

            }
        });
        $("#next").click(function () {
            var teste =0;
            $.ajax({
                type: "POST",
                url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
                data: {limit: 5, offset: offset, teste:teste},
                dataType: 'JSON',
                success: function (data) {
                    tbody.html('');
                    console.log(data);
                    printData(data, tbody);
                    offset += 5;
                }
            });


        });
        $("#precedent").click(function () {
           //la variable teste permet d'eèxecuté deux un sql selons la valeur de teste
            var teste =1;
            $.ajax({
                type: "POST",
                url: "http://localhost/mini-projetDB/src/controller/listeJoueurController.php",
                data: {limit: 5, offset: offset,teste:teste},
                dataType: 'JSON',
                success: function (data) {
                    if ($.trim(data)){
                        tbody.html('');
                        console.log(data);
                        printData(data, tbody);
                        offset -= 5;
                    }
                    else console.log(data);
                }
            });
        });

        function printData(data, tbody) {
            $.each(data, function (indice, user) {
                tbody.append(`
             <tr class="text-center">
                 <td>${user.prenom}</td>
                 <td>${user.nom}</td>
                 <td>${user.score}</td>
                 <td>
                    <img src="../../../assets/Images/user/${user.image}" class="rounded-circle " alt=""
                      width="50" height="50">
                 </td>
                 <td><button class=" mauve"><i class=" fa fa-lock" style="color: white"></i></button></td>


             </tr>
         `);
            });
        }
    });
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


</script>

