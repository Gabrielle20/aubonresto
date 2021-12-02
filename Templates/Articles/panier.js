
function addToCart(id) {
    var data = new FormData();
    data.append('id',id);

    $.ajax({
        type: "post",
        dataType : 'json',
        url: "?page=addToCart",
        cache: false,
        contentType: false,
        processData: false,
        data:data,
        success: function(data, statut){
            console.log(data);
        }
    });

};

function deleteProduct(idArticle, idPanier) {
    var data = new FormData();
    data.append('idArticle', idArticle);
    data.append('idPanier', idPanier);

    $.ajax({
        type: "post",
        dataType : 'json',
        url: "?page=delete",
        cache: false,
        contentType: false,
        processData: false,
        data:data,
        success: function(data, statut){
            if(data== true){
                location.reload();
            }
        }
    });
}