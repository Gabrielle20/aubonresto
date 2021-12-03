<?php
if (!empty($_SESSION['id_user']))
{?>
<!DOCTYPE html>
<html lang="en">

<?php include 'headHtml.html'; ?>

<body>

<?php include('nav.php');?>

<div style="display:flex;">
    <div class="leftSideBar">
        <?php include('sidebar.php');?>
    </div>

    <div class="container">
        <div style="width:60%; margin:0 auto; margin-top:4rem;">
            <div class="selecMoment text-center card-title">
                <h2>Modifier mon profil </h2>
            </div>

            <form action="" method="POST" class="new-article">
                <div class="form-group">
                    <label for="name">Nom: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="<?= $infosUser['name_user'] ?>">
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" value="<?= $infosUser['firstname_user'] ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Phone :</label>
                    <input type="number" class="form-control" name="phone" id="phone" value="<?= $infosUser['phone_user'] ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address :</label>
                    <input type="address" class="form-control" name="address" id="address" value="<?= $infosUser['address_user'] ?>">
                </div>
                <div class="form-group">
                    <label for="email"> Adresse mail :</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $infosUser['email_user'] ?>">
                </div>


                <br/>
                <br/>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php include "footerHtml.html"?>

</body>

</html>
<?php }else {
    header('Location: /RedirectionReservation.php');
} ?>
    ?>