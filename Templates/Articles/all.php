
<div style="display:flex; justify-content: space-between;">
    <div class="leftSideBar">
        <?php include('./Templates/sidebar.php');?>
    </div>


    <div class="row cardMoment" style="width:80%; flex-wrap: wrap; justify-content:space-around;">

    <div style="display:flex; justify-content: space-between;">
        <div class="leftSideBar">
            <?php include('./Templates/sidebar.php');?>
        </div>

        <div class="row cardMoment" style="width:80%; flex-wrap: wrap; justify-content:space-around;">
            
            <?php foreach($articles as $article) : ?>
                <div  style="width:300px;">
                    <div class="card" style="max-width: 100%; margin: 0 auto; margin-bottom:2rem;">
                        <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                        <div class="card-body">
                            <h5 class="text-center card-title"><?= $article['name_article'] ?></h5>
                            <p class="card-text"><?= $article['description_article'] ?></p>
                            <div class="text-center"  style="margin-bottom:1rem;">
                                <?php
                                    if (!empty($_SESSION['id_user'])) {?>
                                        <a href="../getarticles.php?edit=<?= $article['id_article'] ?>" class="btn btn-success text-center" style="width: 80%">Modifier</a>
                                        <br>
                                        <br>
                                <?php }?>
                            </div>
                            <a href="../getarticles.php?delete=<?= $article['id_article'] ?>" class="btn btn-secondary more" style="width: 80%" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">Supprimer</a>
                        </div>
                        <a href="../getarticles.php?articles=all&delete=<?= $article['id_article'] ?>" class="btn btn-secondary more" style="width: 80%">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

