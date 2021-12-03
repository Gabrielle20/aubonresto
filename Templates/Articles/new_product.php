
<div style="width:60%; margin:0 auto;">
    <div class="selecMoment text-center card-title">
        <h2>Nouvel Article </h2>
    </div>

    <form action="" method="POST" class="new-article">
        <div class="form-group">
            <label for="name_article">Nom de l'article : </label>
            <input type="text" class="form-control" name="name_article" id="name_article" placeholder="Nom de l'article">
        </div>
        <div class="form-group">
            <label for="description_article">Description de l'article</label>
            <input type="text" class="form-control" name="description_article" id="description_article" placeholder="Description de l'article">
        </div>
        <div class="form-group">
            <label for="prix_article">Prix :</label>
            <input type="number" step="0.01" class="form-control" name="prix_article" id="prix_article">
        </div>

        <div class="form-group">
            <label for="type_article">Type de l'article</label>
            <select class="form-control" name="type_article" id="type_article">
                <option value="">-</option>
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
