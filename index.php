<html>

<?php
session_start();
include('./Templates/headHtml.html');
define("ROOT", __DIR__);

?>



<body>

<div><?php include('./Templates/nav.php');?></div>
<div class="bannerTitle imgTitle"></div>

<div class="container">
    <div class="selecMoment text-center">
        <h2>Notre sélection du moment</h2>
    </div>
    <div class="row cardMoment">
        <div class="col sm-4">
            <div class="card" style="width: 100%;">
                <img src="./Images/assortiment.jpg" class="card-img-top imageCard" alt="assortiment">
                <div class="card-body">
                    <h5 class="text-center card-title">Assortiments d'entrées Chaudes</h5>
                    <p class="card-text">Brochettes, acras, Samoussas... bref c incroyable</p>
                    <div class="text-center">
                    <a href="#" class="btn btn-success text-center" style="width: 80%">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col sm-4">
            <div class="card" style="width: 100%;">
                <img src="./Images/flan.jpg" class="card-img-top imageCard" alt="Flan">
                <div class="card-body">
                    <h5 class="text-center card-title">Flan coco caramel</h5>
                    <p class="card-text">Aussi sucré qu'un tismé.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-success text-center" style="width: 80%">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col sm-4">
            <div class="card" style="width: 100%;">
                <img src="./Images/colombo.jpg" class="card-img-top imageCard" alt="...">
                <div class="card-body">
                    <h5 class="text-center card-title">Colombo accompagné de riz basmati</h5>
                    <p class="card-text">La base antillaise</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-success text-center" style="width: 80%">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col sm-6">
        <a class="btn btn-outline-success reservBtn" href="#">🍴Envie de se faire plaisir avant le 15 Janvier ?🍴 </br> Réservez donc ici pour manger sur place</a>
        </div>
        <div class="col sm-6">
        <a class="btn btn-outline-info reservBtn" href="#">🍴Pas la possibilité de manger sur place?🍴 </br> Commander  donc ici pour manger sur place</a>
        </div>
    </div>


</div>



<?php include('./Templates/footerHtml.html')?>



</body>



</html>
