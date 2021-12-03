<?php
include_once "./Templates/nav.php"; 


?>
 <!DOCTYPE html>
<html lang="fr">
<?php include('./Templates/headHtml.html')?>
<body>
<div class="container">
    <div class="selecMoment text-center">
        <h2>Réserver une table</h2>
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
</body>
</html>