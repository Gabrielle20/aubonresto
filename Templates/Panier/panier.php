


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
                                        <p class="mb-0"><?= $results['count'] ?> articles dans le panier</p>
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

                                  
                                       <label class="form-label" for="typeName">Choix du paiement</label>
                                            </div>

                                            <!--<div class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                                placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                                <label class="form-label" for="typeText">Numéro de carte</label>
                                            </div>

                                            <form class="mt-4" action="" method="POST">
                                                
                                                
                                                <div class="row mb-4">
                                                    <div class="form-outline form-white">
                                                        <div class="form-label">
                                                            <p>Au Bon Resto : 12 rue de Paris, 75012</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <p class="mb-2">Total</p>
                                                <p class="mb-2"><?php if($results['panier'] !== null) { echo $results['panier']['total_panier'];} else{ echo "0"; } ?> €</p>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-block btn-lg">
                                                <div class="d-flex justify-content-between">
                                                    <span><?php if($results['panier'] !== null) { echo $results['panier']['total_panier']; }else {echo "0";} ?> €</span>
                                                    <i class="fas fa-long-arrow-alt-right ms-2"></i>
                                                </div>
    

                                            <a href="../getpaiement.php?paiement" class="btn btn-info btn-block btn-lg"><?php if($panier !== null) { echo $panier['total_panier']; }else {echo "0";} ?> €</a>


                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

