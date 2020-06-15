$(document).ready(function () {
    let offset = 0;
    //console.log(id);
    const tbody = $('#tbody');
    const user =$('#user');
    $.ajax({
        type: "post",
        url: "http://localhost/mini-projetDB/src/controller/scoreController.php",
        data: {limit: 10 ,offset:offset},
        dataType: 'json',
        success: function (data) {
            console.log("success");
                tbody.html('');
                printData(data, tbody);
                offset +=10
        },
        error: function (data) {
            console.log(data);
        console.log('erreur lors de la recupération des donnée');
        }
    });
    function printData(data, tbody) {
        $.each(data, function (indice, user) {
            tbody.append(`
             <tr id="${user.prenom}" class="text-center h1 text-monospace mauve">
                 <td id="id_$">${user.prenom}</td>
                <td id="id_$" >${user.nom}</td>

                 <td id="id_$">${user.score} pts</td>
              </tr>
         `);
        });
    }
});
