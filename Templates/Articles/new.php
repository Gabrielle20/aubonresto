<!DOCTYPE html>
<html lang="en">

<?php include './Templates/headHtml.html'; ?>

<body>
    <?php include('./Templates/nav.php');?>

    <form action="" method="POST">
        <label for="title">
            Nom : 
            <input type="text" name="title" id="title">
        </label>
        <label for="content">
            Description : 
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </label>

        <label for="prix">
            Prix : 
            <input type="number" name="prix" id="prix">
        </label>

        <!--<label for="categorie">
            Catégorie:
            <select name="categorie_id" id="categorie">
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= $categorie->getId() ?>"><?= $categorie->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </label>-->
        
        <label for="picture">
            Image
            <input type="file" name="picture" id="picture">
        </label>
        <button>Envoyer</button>
    </form>


    <?php include "./Templates/footerHtml.html"?>
</body>

</html>