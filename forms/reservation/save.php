<?php
include ROOT."/Templates/nav.php"; 


?>
 <!DOCTYPE html>
<html lang="fr">
<?php include('./Templates/headHtml.html')?>
<body>
<div class="container">
    <div class="selecMoment text-center">
        <h2>Réserver une table</h2>
    </div>
    <div class="Message">
    <?php
?>
    </div>
    <div class="row cardMoment" align="center">
        <div class="col sm-4" style="align-content: center; ">
            <div class="card" style="width: 50%; padding:4px; " align="center">
                <form action="" method="POST">
                    <div class="row" style="width: 100%; margin: 2px">
                        <label for="date_reservation">Date de la réservation : </label>
                        <input style="text-align: center;" type="date" name="date_reservation" required>
                    </div>
                    <div class="row" style="width: 100%; margin:2px; ">
                        <label for="id_table">Table que vous souhaitez réserver </label>
                        <select style="text-align: center;" name="id_table">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                            <option value=6>6</option>
                            <option value=7>7</option>
                            <option value=8>8</option>
                            <option value=9>9</option>
                            <option value=10>10</option>
                        </select>
                    </div>
                    <button id="reserverbtn" class="btn btn-success text-center" type="submit">Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#reserverbtn").click(function() {
            var date_reservation = $("input[name=date_reservation]").val();
            var id_table] = $("input[name=id_table]").val();

            var form_data = new FormData();

            form_data.append('date_reservation',date_reservation);
            form_data.append('id_table',id_table]);

            $.ajax({
                type: "post",
                dataType : 'json',
                url: "../reservation.php",
                cache: false,
                contentType: false,
                processData: false,
                data:form_data,
                success: function(data, statut){
                    console.log(data.check)
                    // Contenue en cas de réussite
                    $(".Messages").children().remove();
                    if (!data.reservation_validee){

                        $('.Messages').append(
                        <div class="alert alert-danger text-center mt-4" role="alert">
                            Cette table est déjà réservée à cette date. 
                        </div>
                    );
                    }

                }
            });
        });
    });
</script>
</body>
</html>