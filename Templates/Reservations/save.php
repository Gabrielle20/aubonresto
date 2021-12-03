<div class="container">
    <div class="selecMoment text-center">
        <h2>Réserver une table</h2>
    </div>
    <div class="row cardMoment" align="center">
        <div class="col sm-4" style="align-content: center; ">
            <div class="card" style="width: 50%; padding:4px; " align="center">
                    <div class="row" style="width: 100%; margin: 2px">
                        <label for="date_reservation">Date de la réservation : </label>
                        <input style="text-align: center;" type="date" name="date_reservation"  id="date_reservation" required>
                    </div>
                    <div class="row" style="width: 100%; margin:2px; ">
                        <label for="id_table">Table que vous souhaitez réserver </label>
                        <select id="id_table">
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
                    <button class="btn btn-primary" id="reserverbtn" type="button">Réserver</button>
            </div>
        </div>
    </div>
</div>
>
<script>
    $("#reserverbtn").click(function() {
        var date_reservation = $("#date_reservation").val();
        var id_table = $("#id_table :selected").val();

        var form_data = new FormData();


        form_data.append('date_reservation',date_reservation);
        form_data.append('id_table',id_table);

        $.ajax({
            type: "post",
            dataType : 'json',
            url: "?page=addReservation",
            cache: false,
            contentType: false,
            processData: false,
            data:form_data,
            success: function(data, statut){
                console.log(data)
                // Contenue en cas de réussite
                $(".Messages").children().remove();


            }
        });
    });
</script>