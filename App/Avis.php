<!DOCTYPE html>
<html lang="fr">

<?php include '../Templates/headHtml.html'; ?>

<body>
    <div>
        <form action="" method="post">
            <label for="commentaire">Laisser un commentaire</label>
            <textarea name="commentaire" id="commentaire" cols="40" rows="4"></textarea>
            <a id="stars" href="?stars=1" title="Donner 1/5">★</a>
            <a id="stars" href="?stars=2" title="Donner 2/5">★</a>
            <a id="stars" href="?stars=3" title="Donner 3/5">★</a>
            <a id="stars" href="?stars=4" title="Donner 4/5">★</a>
            <a id="stars" href="?stars=5" title="Donner 5/5">★</a>
            <button>Envoyer</button>
        </form>
    </div>
</body>

</html>