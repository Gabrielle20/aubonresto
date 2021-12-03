<!DOCTYPE html>
<html lang="en">

<?php include './Templates/headHtml.html'; ?>

<body>

    <?php include('./Templates/nav.php');?>

    <div style="display:flex;">
        <div class="leftSideBar">
            <?php include('./Templates/sidebar.php');?>
        </div>

        <div class="container">
            <div style="width:60%; margin:0 auto; margin-top:4rem;">
                <div class="selecMoment text-center card-title">
                    <h2>Nouvel Article </h2>
                </div>
    
                <form action="" method="POST" class="new-article">
                    <div class="form-group">
                        <label for="name_article">Nom de l'article : </label>
                        <input type="text" class="form-control" name="name_article" id="name_article" placeholder="Nom de l'article" value="<?= $article['name_article'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="description_article">Description de l'article</label>
                        <input type="text" class="form-control" name="description_article" id="description_article" placeholder="Description de l'article" value="<?= $article['description_article'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="prix_article">Prix :</label>
                        <input type="number" step="0.01" class="form-control" name="prix_article" id="prix_article" value="<?= $article['prix_article'] ?>">
                    </div>
    
                    <div class="form-group">
                        <label for="type_article">Type de l'article</label>
                        <select class="form-control" name="type_article" id="type_article">
                            <option value="<?= $article['type_article'] ?>" selected><?= $article['type_article'] ?></option>
                            <option value="boissons">Boissons</option>
                            <option value="entrées">Entrées</option>
                            <option value="plats">Plats</option>
                            <option value="desserts">Desserts</option>
                        </select>
                        
                    </div>
    
                    <br/>
                    <label for="picture">
                        Image
                        <input type="file" name="picture" id="picture">
                    </label>
                    <br/>
                    <br/>
                    <br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <?php include "./Templates/footerHtml.html"?>

</body>

</html>