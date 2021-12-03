

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
                                <a href="?page=editPage&articles=all&edit=<?= $article['id_article'] ?>" class="btn btn-success text-center" style="width: 80%">Modifier</a>
                                <br>
                                <br>
                        <?php }?>
                    </div>
                    <button class="btn btn-secondary more" style="width: 80%" onclick="deleteArticle(<?= $article['id_article'] ?>)">Supprimer</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<script>

    function deleteArticle(id){

        var form_data = new FormData();

        form_data.append('idArticle',id);

        $.ajax({
            type: "post",
            dataType : 'json',
            url: "?page=deleteArticle",
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
    }
</script>