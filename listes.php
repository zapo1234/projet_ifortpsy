<?php
include("classes/db.classes.php");
include("classes/avis.classes.php");
include("classes/add.classes.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>liste des avis</title>
<link rel="stylesheet" href="css/styles1.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	  
</head>
<body>
    <div class="container">
                    
                   <div id="user_admins"><!--afficher la liste des avis-->
				   <div class="action">
				   <h1>Trier la liste par la date ou les notes</h1>
				   <form method="post" action="">
				    <input type="date" name="dates" id="dates"><input type="number" name="not" id="not"><button type="button" class="button"><a href="listes.php">Afficher la liste des avis</a> </button><button type="button" class="button"><a href ="index.php">Ajouter un avis</button></a><br/><br/>
				   </form>
				   <div id="resultat"></div><!--retour ajax lister les avis par date-->
				   <div id="resultats"></div><!--retour ajax lister les avis par date-->
				   <h2>Liste des avis </h2>
				   </div>
                    <?php
                    // instancier la class add
					// afficher un tableau qui liste les avis
					$add = new Add();
					$list = $add->listAvis();
					// initilisation d'un tableau
				    if($list){
					$outpout= '<table class="tab" border="1" style=width:"700px";height:"400px";text-align:center">
					<th>Nom</th>
					<th>email</th>
					<th>Avis clients</th>
					<th>Note<th>
					<th>Date d\'emission</th>';
					foreach($list as $values) {
					// recupere la date et la transformer en français
					$date = explode('-',$values['date']);
	                $js = $date[2];
	                $mms = $date[1];// recuperation search_date
	                $ans = $date[0];
					$outpout .='<tr><td>'.$values['nom'].'</td>
					            <td>'.$values['email'].'</td>
								<td>'.$values['message'].'</td>
								<td>'.$values['note'].'<td>
								<td>'.$js.'/'.$mms.'/'.$ans.'</td>
								</tr>';
					}
					
					$outpout .='</table>';
					echo$outpout;
					}
					else{
					echo'';
					}
				    ?>					

					
				    <div>
		</div>
						
                           
<?php include('js/inc_foot_scriptjs.php');?>   
<script type="text/javascript">
$(document).ready(function(){
// traiter via ajax le chargement de la page
$('#dates').change(function(){
var dates =$('#dates').val();
var action="recher_date";
$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'listes_avis_date.php',// on traite par la fichier
	data:{dates:dates,action:action},
	success:function(data) { // on traite le fichier recherche apres le reto
        $('#resultat').html(data)
		$('.tab').css('display','none');
		$('.table').css('display','none');//fermer la table recherche via note
	 },
	 error: function() {
    $('#resultat').text('vérifier votre connexion'); }
	 });
});

$('#not').keyup(function(){
var note =$('#not').val();
var action="recher_note";
$.ajax({
	type: 'POST', // on envoi les donnes
	url: 'listes_avis_date.php',// on traite par la fichier
	data:{note:note,action:action},
	success:function(data) { // on traite le fichier recherche apres le reto
        $('#resultats').html(data)
		$('.tab').css('display','none');// cacher le tableau de list
		$('.tabs').css('display','none');// cacher le tableau de liste date
	 },
	 error: function() {
    $('#resultats').text('vérifier votre connexion'); }
	 });
});

});
</script> 
</body>
</html>
