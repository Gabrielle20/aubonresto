
<?php


use Core\Database\ConnexionBDD;
use App\FormConnexion;
//---------------------------------------------------------------------------------------------

$ConnexionBDD = New ConnexionBDD ();// Appel de la class
?>

<div class="bannerTitle imgCon"></div>
<div class="container  ">
    <form method="post" class="row g-3 needs-validation forms " id="formCon" novalidate>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="login" class="form-label"> Login : </label>
                <input type="email" name="login" id="login" class="form-control" placeholder="nom@exemple.com" required >
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label"> Mot de passe : </label>
                <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="6 caratère minimum" required>
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary submit" name="submit" id="buttonConn" type="button"> Accéder à mon compte </button>
            </div>

        </div>
        <div class="Messages"></div>
    </form>



</div>



</div>

<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                forms[0][2].addEventListener('click', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        $('.Messages').append(`
                                <div class="alert alert-danger text-center mt-4" role="alert">
                                    Veuillez remplir tous les champs!
                                </div>
                        `);
                    }

                    form.classList.add('was-validated')
                }, false)
            })

    })()




    $(document).ready(function(){
        $("#buttonConn").click(function() {


            var login = $("input[name=login]").val();
            var pwd = $("input[name=password]").val();

            var form_data = new FormData();

            form_data.append('login',login);
            form_data.append('password',pwd);
            form_data.append('role','user');

            $.ajax({
                type: "post",
                dataType : 'json',
                url: "?page=login&action=inLogin",
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

                        if(!data.check.UserExist){
                            $('.Messages').append(`
                                    <div class="alert alert-danger text-center mt-4" role="alert">
                                        Adresse mail ou mot de passe incorrect!
                                    </div>
                                `);
                        }
                        if(data.check.ConnexionOk){

                            window.location.replace("pageprofile.php");

                        }
                    }

                }
            });
        });
    });
</script>

