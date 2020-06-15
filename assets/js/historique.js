
$(document).ready(function () {
    var id = $('#phpVar').val();
    console.log(id);
    const tbody = $('#tbody');
    const user =$('#user');
    $.ajax({
        type: "POST",
        url: "http://localhost/mini-projetDB/src/controller/scoreController.php",
        data: {limit: 10, id:id},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            tbody.html('');
            printData(data, tbody);
        }
    });
//scloll
    //  Scroll
    const scrollZone = $('#scrollZone');
    scrollZone.scroll(function () {
        //console.log(scrollZone[0].clientHeight)
        const st = scrollZone[0].scrollTop;
        const sh = scrollZone[0].scrollHeight;
        const ch = scrollZone[0].clientHeight;
        // console.log(st,sh, ch);
        if (sh - st <= ch) {
            $.ajax({
                type: "POST",
                url: "http://localhost/mini-projetDB/src/controller/scoreController.php",
                data: {limit: 5},
                dataType: "json",
                success: function (data) {
                    printData(data, tbody);
                    offset += 5;
                }
            });
        }
    });
    function printData(data, tbody) {
        $.each(data, function (indice, score) {
            tbody.append(`
             <tr id="${score.id}" class="text-center h2 bleu ">
                 <td id="id_$">${score.date_jeux}|</td>
                 <td id="id_${score.score}" >${score.score} pts</td>
               </tr>
         `);
        });
    }
});



