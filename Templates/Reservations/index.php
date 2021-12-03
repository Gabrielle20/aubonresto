<!DOCTYPE html>
<html lang="fr">
    <?php include('./Templates/headHtml.html')?>
    <body>
    <?php include_once "./Templates/nav.php"; ?>
        <div class="container">
            <div class="selecMoment text-center">
                <h2>Vos Réservations</h2>
            </div>
            <?php foreach($reservations as $reservation) : ?>
            <div class="row cardMoment" align="center">
                <div class="col sm-4" style="align-content: center; ">
                    <div class="card" style="width: 50%; padding:4px; " align="center">
                            <div>
                                <h3>n° <?= $reservation['id_reservation'] ?></h3>
                                <h4>Table réservée : <?= $reservation['id_table'] ?></h4>
                                <h4>Date de la réservation : <?= $reservation['date_reservation'] ?></h4>
                            </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>