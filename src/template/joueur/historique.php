<?php
session_start();
?>
<table class="table  ">
    <thead class="bleu ">
    <tr>
        <!--th class="border-right mr-4 ">Top10</th-->
        <th>date</th>
        <th>score</th>
    </tr>
    </thead>
    <tbody id="tbody">
    <tr class="mauve ">
        <td>23/04/2020</td>
        <td>121 pts</td>
    </tr>
    </tbody>
</table>
<input type="hidden" id="phpVar" value="<?php echo $_SESSION['user']['id'];?>">

<script src="../../../assets/js/historique.js"></script>
