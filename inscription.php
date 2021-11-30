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

<div class="bannerTitle imgReg"></div>

    <div class="container ">
                <form class="row g-3 needs-validation forms" method="post" novalidate>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nom</label>
                        <input type="name" name="name" id="name" class="form-control" placeholder="Parker" required>
                        <div class="invalid-feedback">
                            Ce champ est obligatoire.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Jean" required>
                        <div class="invalid-feedback">
                            Ce champ est obligatoire.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="phone" name="phone" id="phone" class="form-control" placeholder="06 23 56 84 12" required>
                        <div class="invalid-feedback">
                            Ce champ est obligatoire.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="12 rue de paris, 75001"  required>
                        <div class="invalid-feedback">
                            Ce champ est obligatoire.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="name@exemple.com" required >
                        <div class="invalid-feedback">
                            Ce champ est obligatoire.
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="6 caratère minimum" required>
                        <div class="invalid-feedback">
                            Ce champ est obligatoire.
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary text-center submit" type="submit">S'inscrire</button>
                    </div>
                    <div class="Messages"></div>

                </form>




    </div>

<script>
(function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

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

