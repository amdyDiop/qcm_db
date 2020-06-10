$(document).ready(function () {
    let offset = 0;
    const tbody = $('#tbody');
    const user =$('#user');
    $.ajax({
        type: "POST",
        url: "http://localhost/mini-projetDB/src/controller/listeAdminController.php",
        data: {limit: 5, offset: offset},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            tbody.html('');
            printData(data, tbody);
            offset += 5;
        }
    });
    tbody.on('click', 'button', function () {
       // $(this).parents("tr").hide();
        var id = $(this).attr('id');
        const tab = id.split("_");
        if (tab[0] == "supp") {
            if (confirm('Voulez-vous vraimment supprimer cette administratreur')) {
                console.log(tab[1] + "vas etre supprimé");
                $.ajax({
                    type: "POST",
                    url: "http://localhost/mini-projetDB/src/controller/listeAdminController.php",
                    data: {id: tab[1]},
                    dataType: 'text',
                    success: function (data) {
                        var message = $('#message');
                        console.log(data);
                        if (data==1){
                            console.log("l'administrateur a été supprimé");
                            $(this).parents('tr').hide();

                            message.addClass("alert alert-success");
                            message.html("l'administrateur a été supprimé");
                            message.fadeIn().delay(3000).fadeOut();
                        }
                        else{
                            message.addClass("alert alert-danger");
                            message.html("Erreur l'ors de la suppression");
                            message.fadeIn().delay(2000).fadeOut();
                            $('#message').append(` <span class="alert alert-danger" >   </span>`).hide(3000);

                            console.log('erreur lors de la suppression');
                        }

                    }
                });
            }
        }
        else {
            console.log(tab[1] + " sera vusualisée");
            $.ajax({
                type: "POST",
                url: "http://localhost/mini-projetDB/src/controller/listeAdminController.php",
                data: {infoAdmin: tab[1]},
                dataType: 'json',
                success: function (data) {
                    var message = $('#message');
                    user.html("");
                    printAdmin(data, user);
                }
            });
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
                url: "http://localhost/mini-projetDB/src/controller/listeAdminController.php",
                data: {limit: 5, offset: offset},
                dataType: "json",
                success: function (data) {
                    printData(data, tbody);
                    offset += 5;
                }
            });
        }
    });
    function printData(data, tbody) {
        $.each(data, function (indice, user) {
            tbody.append(`
             <tr id="${user.id}" class="text-center">
                 <td id="id_${user.id}">${user.id}</td>
                 <td id="id_${user.id}" >${user.prenom}</td>
                 <td id="id_${user.id}">${user.nom}</td>
        
                 <td id="id_${user.id}">
                    <img src="../../../assets/Images/user/${user.image}" class="rounded-circle " alt=""
                      width="50" height="50">
                 </td>
                 <td>
                  <button id="supp_${user.id}" class="btn  btn-danger"><span class="fa fa-archive"></span></button>
                  <a href="#admin" rel="modal:open"><button  id="info_${user.id}" class="btn btn-info"><span class="fa fa-binoculars"> </span></button></a>
                  </td> 
               </tr>
         `);
        });
    }


    function printAdmin(data, user) {
        $.each(data, function (indice, admin) {
            user.append(`
   
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../../../assets/Images/user/${admin.image}" style="width: 70px;height: 70px";>
                </div>
                <div class="modal-body">
                    <form>
                        <div class=" row form-group">
                            <div class="col-ms-6">
                                <label for="prenom" class="col-form-label">Prénom:</label>
                                <input type="text" class="form-control mr-2" id="prenom" name="prenom" value="${admin.prenom}">
                            </div>

                            <div class="col-ms-6">
                                <label for="nom" class="col-form-label">Nom:</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="${admin.nom}">
                            </div>
                        </div>
                        <div class=" row form-group">
                            <div class="col-ms-6">
                                <label for="login" class="col-form-label">Login:</label>
                                <input type="text" class="form-control mr-2" id="login" name="login" value="${admin.username}">
                            </div>

                            <div class="col-ms-6">
                                <label for="id" class="col-form-label">Id:</label>
                                <input type="number" class="form-control" id="id" name="id" value="${admin.id}">
                            </div>
                        </div>
                        <div class=" row form-group">
                            <div class="col-ms-6">
                                <br>
                                <label for="role" class="col-form-label">Role:</label>
                                <input type="text" class="form-control" id="rele" name="role" value="${admin.role}">
                            </div>
                            <div class="col-ms-6">
                                <button type="button" class="btn btn-primary mt-5">Modifier changement </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
     
     

         `);
        });
    }

});


