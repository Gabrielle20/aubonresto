
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="cardUser p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center">
            <button class="btnCardUser btn-secondary">
                <img class="imgCard" src="/images/profil.png" height="100" width="100" />
            </button> <span class="name mt-3"><?= $name." ".$firstname; ?></span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd"><strong>Adresse mail: </strong><?= $email; ?></span>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd"><strong>Numéro de téléphone: </strong>  0<?= $phonenumber; ?></span>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd"><strong>Adresse: </strong><?= $address; ?></span>
            </div>
            <div class=" d-flex mt-2">
                <button class="btn1 btn-dark">Edit Profile</button>
            </div>
        </div>
    </div>
</div>

