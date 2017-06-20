<?php
/**
 * Created by PhpStorm.
 * User: M418485
 * Date: 16/12/2016
 * Time: 13:15
 */

?>

<script>
    $(document).ready( function () {
        $("#newQuestionForm").submit( function() {	// à la soumission du formulaire
            var question_lineText = $(".question_lineText").map(function () {
                return this.value;
            }).get();
            var question_lineTrue = $(".question_lineTrue").map(function () {
                return this.value;
            }).get();

            $.ajax({ // fonction permettant de faire de l'ajax
                type: "POST", // methode de transmission des données au fichier php
                url: "<?php echo site_url("admin/Createur/create_ajax")?>", // url du fichier php
                data: "videoId="+$("#videoId").val()+"&questionText="+$("#questionText").val()+"&questionType="+$("#questionType").val()+"&question_lineText="+JSON.stringify(question_lineText)+"&question_lineTrue="+JSON.stringify(question_lineTrue), // données à transmettre
                success: function(msg){ // si l'appel a bien fonctionné
                    if(msg==1) // si la connexion en php a fonctionnée
                    {
                        alert(msg);
                        $("span#erreur").html("<h3>Question soumise</h3>");
                        // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
                    }
                    else // si la connexion en php n'a pas fonctionnée
                    {
                        alert(msg);
                        $("span#erreur").html("<h3>Question refusée, erreur</h3>");                        // on affiche un message d'erreur dans le span prévu à cet effet
                    }
                }
            });
            return false; // permet de rester sur la même page à la soumission du formulaire
        });
    });
</script>

<?php
/*
$("#newQuestionformSub").click(function (e) {
e.preventDefault();

var question_lineText = $(".question_lineText").map(function () {
return this.value;
}).get();

console.log(question_lineText);
$.ajax({ // fonction permettant de faire de l'ajax
type: "POST", // methode de transmission des données au fichier php
url: "<?php //site_url("admin/Createur/create_ajax")?>", // url du fichier php
data: "videoId="+$("#VideoId").val()+"&questionText="+$("#questionText").val()+"&questionType="+$("#questionType").val()+"&questionText="+$("#questionText").val()+"&questionText="+$("#questionText").val(), // données à transmettre
success: function(msg){ // si l'appel a bien fonctionné
if(msg==1) // si la connexion en php a fonctionnée
{
$("div#connexion").html("<span id=\"confirmMsg\">Vous &ecirc;tes maintenant connect&eacute;.</span>");
// on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
}
else // si la connexion en php n'a pas fonctionnée
{
$("span#erreur").html("<img src=\"bomb.png\" style=\"float:left;\" />&nbsp;Erreur lors de la connexion, veuillez v&eacute;rifier votre login et votre mot de passe.");
// on affiche un message d'erreur dans le span prévu à cet effet
}
}
});
return false; // permet de rester sur la même page à la soumission du formulaire
});*/
?>