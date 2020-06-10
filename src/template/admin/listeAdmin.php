<div id="scrollZone" class="card col-10 bg-primary border-primary scrollZone">
    <div id="message"></div>
    <table class="table table-bordered table-hover text-center mt-1 ">
        <thead class="bleu">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
</div>
<div class="card col-2 bg-primary border-primary ">
    <div class="row justify-content-center pt-4 mb-5 mt-4 ">
        <input class="button mt-4  roundButton" type="submit" value=">">
    </div>
    <div class="row justify-content-center pt-4 mt-5">
        <button class="button mt-4 roundButton" type="button"><</button>
    </div>
</div>
<div class="modal" id="admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="user">

        </div>
    </div>
</div>
<!-- Link to open the modal -->
<!--p><a href="#admin" rel="modal:open">Open Modal</a></p-->
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>

<script src="../../../assets/js/listeAdmin.js"></script>
