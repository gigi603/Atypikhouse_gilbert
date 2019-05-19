$(".delete").on("click", function(){
    return confirm("Voulez-vous vraiment désactiver cette catégorie?");
});

$(".delete-comment").on("click", function(){
    return confirm("Voulez-vous vraiment supprimer ce commentaire?");
});

$(".delete-propriete").on("click", function(){
    return confirm("Voulez-vous vraiment supprimer cette proprieté?");
});

$(".delete-annonce").on("click", function(){
    return confirm("Voulez-vous vraiment supprimer cette annonce?");
});

$(".delete-user").on("click", function(){
    return confirm("Voulez-vous vraiment supprimer ce client?");
});

$('#1').click(function() {
    $('#hebergement').css('display', 'block');
    $('#reservation').css('display', 'none');
    $('#utilisateur').css('display', 'none');
    $('#avis').css('display', 'none');
    $('#proprietes').css('display', 'none');
});
$('#2').click(function () {
    $('#hebergement').css('display', 'none');
    $('#reservation').css('display', 'block');
    $('#utilisateur').css('display', 'none');
    $('#avis').css('display', 'none');
    $('#proprietes').css('display', 'none');
});
$('#3').click(function () {
    $('#hebergement').css('display', 'none');
    $('#reservation').css('display', 'none');
    $('#utilisateur').css('display', 'block');
    $('#avis').css('display', 'none');
    $('#proprietes').css('display', 'none');
});
$('#4').click(function () {
    $('#hebergement').css('display', 'none');
    $('#reservation').css('display', 'none');
    $('#utilisateur').css('display', 'none');
    $('#avis').css('display', 'block');
    $('#proprietes').css('display', 'none');
});
$('#5').click(function () {
    //$('#hebergement').css('display', 'none');
    //$('#reservation').css('display', 'none');
    //$('#utilisateur').css('display', 'none');
    //$('#avis').css('display', 'none');
    //$('#proprietes').css('display', 'block');
});

/* method to add/remove field*/
$(document).ready(function(){
    $('#utilisateur').css('display', 'block');
    $('#proprietes').css('display', 'block');
});
