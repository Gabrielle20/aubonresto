<!DOCTYPE html>
<html lang="fr">

<?php include './Templates/headHtml.html'; ?>

<body>
<?php include './Templates/nav.php';?>
    <div class="containerPaiement" class="mx-auto" style="width: 1100px;">
        <div class="rowPaiement">
            <form method="post" action="../getpanier.php">
                <div id="titleVisa">
                    <h1><img src="../Images/visa.png" alt="">Paiement par carte</h1>
                </div>
                <div class="form-group">
                    <label for="cardTitulaire">Titulaire de la carte</label>
                    <input type="text" class="form-control" id="cardTitulaire" placeholder="J.Smith" required>
                </div>
                <div class="form-group">
                    <label for="cardNumber">Numéro de carte</label>
                    <input type="number" class="form-control" id="cardNumber" placeholder="111 222 333 444 555" required>
                </div>
                <div class="rowPaiement">
                    <div class="col">
                        <label for="dateExp">Date d'expiration</label>
                        <input type="month" class="form-control" id="dateExp" required>
                    </div>
                    <div class="col">
                        <label for="codeCvv">CVV</label>
                        <input type="number" class="form-control" id="codeCvv" name="codeCvv" placeholder="123" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btnPaiement" name="valide" value="validé">Payer</button>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <?php include './Templates/footerHtml.html'; ?>
</body>

</html>