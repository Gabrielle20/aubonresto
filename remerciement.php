<html lang="fr">

<?php
define("ROOT", __DIR__);
include(ROOT . '/Templates/headHtml.html');
include 'Templates\nav.php';
?>

<body>
    <div id="remerciement">
        <h1>Nous vous remercions pour votre commande</h1>
        <h4>Votre commande a été prise en compte et sera traitée dans les meilleurs délais. Vous avez la possibilité de télécharger votre facture.</h4>
        <a href="index.php">Revenir a la page d'accueil</a>
    </div>
    <button id="btnFacture"><a href="App/CreateFacture.php" target="_blank">Obtenir votre facture</a></button>
    <?php include 'Templates/footerHtml.html' ?>
</body>

</html>