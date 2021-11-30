<html>
<?php

include_once './class/bdd/connexionbdd.php';
include_once './class/inscription/forminscription.php';

include './Templates/headHtml.html';

//----------------------------------------------------------------------------------------------
$ConnexionBDD = New ConnexionBDD ('mysql-aubonresto.alwaysdata.net','aubonresto_db','250765_dbuser','aubonrestobg95');// Appel de la class
?>
<body>
<?php include('./Templates/nav.php');?>

<form method="post" id="formInscription">
    <div class="container ">

        <h2> Inscription <h2>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="name"> name : </label>
                        <input type="name" name="name" id="name" class="form-control" placeholder="Smith" >
                    </div>

                    <div class="col-md-6">
                        <label for="firstname"> firstname : </label>
                        <input type="firstname" name="firstname" id="firstname" class="form-control" placeholder="Jean" >
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-6">
                        <label for="email"> E-mail : </label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="name@exemple.com" >
                    </div>

                    <div class="col-md-6">
                        <label for="phone"> Télephone : </label>
                        <input type="phone" name="phone" id="phone" class="form-control" placeholder="06 23 56 84 12" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="address"> address : </label>
                        <input type="address" name="address" id="address" class="form-control" placeholder="12 rue de paris, 75001" >
                    </div>

                    <div class="col-md-6">
                        <label for="password"> Mot de passe : </label>
                        <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="6 caratère minimum">
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary" name="submit" id="buttonInscription" type="button"> Valider l'inscription </button>
                </div>


    </div>
    <div class="Messages"></div>
</form>

<script>
    $(document).ready(function(){
        $("#buttonInscription").click(function() {
            var nameuser = $("input[name=name]").val();
            var firstname = $("input[name=firstname]").val();
            var email = $("input[name=email]").val();
            var phone = $("input[name=phone]").val();
            var address = $("input[name=address]").val();
            var pwd = $("input[name=password]").val();

            var form_data = new FormData();
            form_data.append('name',nameuser);
            form_data.append('firstname',firstname) ;
            form_data.append('email', email);
            form_data.append('phone',phone);
            form_data.append('address',address);
            form_data.append('password',pwd);

            $.ajax({
                type: "post",
                dataType : 'json',
                url: "getinscription.php",
                cache: false,
                contentType: false,
                processData: false,
                data:form_data,
                success: function(data, statut){
                    console.log(data.check)
                    // Contenue en cas de réussite
                    $(".Messages").children().remove();
                    if (data.check.errorMessage){

                        $('.Messages').append(`
                                <div class="alert alert-danger text-center mt-4" role="alert">
                                    Veuillez remplir tous les champs!
                                </div>
                            `);
                    }else{

                        if(data.check.mailExist){
                            $('.Messages').append(`
                                    <div class="alert alert-danger text-center mt-4" role="alert">
                                        L'addresse email est déjà prise !
                                    </div>
                                `);
                        }
                        if(data.check.inscriptionOk){
                            $('.Messages').append(`
                                    <div class="alert alert-success text-center mt-4" role="alert">
                                       	Inscription réussie!
                                    </div>
                                `);
                            $('#formInscription')[0].reset();
                        }
                    }

                }
            });
        });
    });
</script>

<?php include './Templates/footerHtml.html' ?>
</body>
</html>

