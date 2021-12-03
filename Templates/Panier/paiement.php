<!DOCTYPE html>
<html lang="fr">

<?php include './Templates/headHtml.html'; ?>

<body>
<?php include('./Templates/nav.php');?>

    <div class="containerPaiement" class="mx-auto" style="width: 1100px;">
        <div class="rowPaiement">
            <form>
                <div id="titleVisa">
                    <h1><img src="../Images/visa.png" alt="">Paiement par carte</h1>
                </div>
                <div class="form-group">
                    <label for="cardTitulaire">Titulaire de la carte</label>
                    <input type="email" class="form-control" id="cardTitulaire" aria-describedby="emailHelp" placeholder="J.Smith">
                </div>
                <div class="form-group">
                    <label for="cardNumber">Numéro de carte</label>
                    <input type="number" class="form-control" id="cardNumber" placeholder="111 222 333 444 555">
                </div>
                <div class="rowPaiement">
                    <div class="col">
                        <label for="exampleInputEmail1">Date d'expiration</label>
                        <input type="month" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1">CVV</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="123">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btnPaiement">Payer</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <?php include "./Templates/footerHtml.html"?>
</body>

</html>