<!DOCTYPE html>
<html lang="en">
    <?php include './Templates/headHtml.html'; ?>
<body>
    <?php include('./Templates/nav.php');?>

    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="#!" class="text-body">
                                        <a href="../index.php"><i class="fas fa-long-arrow-alt-left me-2"></i>Continuer vos achats</a>
                                    </h5>

                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Panier</p>
                                            <p class="mb-0"><?= $count ?> articles dans le panier</p>
                                        </div>
                                    </div>

                                    <?php if($articles !== null) { ?>
                                        <?php foreach($articles as $article) : ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-shopping-carts/img1.jpg"
                                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                            </div>

                                                            <div class="ms-3">
                                                                <h5><?= $article['name_article'] ?></h5>
                                                                <p class="small mb-0"><?= $article['description_article'] ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 80px;">
                                                            <h5 class="mb-0"><?= $article['prix_article'] ?> €</h5>
                                                            </div>
                                                            <a href="../getpanier.php?getpanier&removearticle=<?= $article['id_article'] ?>&panierid=<?= $panier['id_panier'] ?>" style="color: #cecece;"><i class="fas fa-trash-alt" style="color: #ccc;"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; }?>

                                </div>

                                <div class="col-lg-5">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Card details</h5>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.jpg"
                                                class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                            </div>

                                            <p class="small mb-2">Card type</p>
                                            <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>

                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                                    placeholder="Cardholder's Name" />
                                                    <label class="form-label" for="typeName">Nom</label>
                                                </div>

                                                <div class="form-outline form-white mb-4">
                                                    <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                                    placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                                    <label class="form-label" for="typeText">Numéro de carte</label>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="typeExp" class="form-control form-control-lg"
                                                        placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                                        <label class="form-label" for="typeExp">Expiration</label>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="typeText" class="form-control form-control-lg"
                                                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                        <label class="form-label" for="typeText">Cvv</label>
                                                    </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total</p>
                                                <p class="mb-2"><?php if($panier !== null) { echo $panier['total_panier'];} else{ echo "0"; } ?> €</p>
                                            </div>

                                            <button type="button" class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between">
                                                    <span><?php if($panier !== null) { echo $panier['total_panier']; }else {echo "0";} ?> €</span>
                                                    <i class="fas fa-long-arrow-alt-right ms-2"></i>
                                                </div>
                                            </button>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "./Templates/footerHtml.html"?>
</body>
</html>