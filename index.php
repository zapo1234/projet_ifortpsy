<?php
include("classes/db.classes.php");
include("classes/avis.classes.php");
include("classes/add.classes.php");
include("classes/token.classes.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>test</title>
<link rel="stylesheet" href="css/styles1.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	  
</head>
<body>
    <div class="container">
                <div><button> <a href="listes.php">Voir  la liste avis</a></button>
                   <form action="index.php"  method="post" id="user_admin">
                          <h1>Entrez un avis client</h1>
						  <div class="form-group">
                              <label for="exampleInputEmail1">Entrez votre nom</label>
                              <input type="text" name="nom"  class="form-control" id="nom" placeholder="entrez votre nom">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Votre e-mail</label>
                              <input type="email" name="email" id="email"  class="form-control" placeholder="votre mail">
                           </div>
						   
						   <div class="form-group">
                              <label for="exampleInputEmail1">Votre avis</label>
                              <textarea  name="message" id="message"  class="form-control" aria-describedby="emailHelp" placeholder="entrez votre avis"></textarea>
                           </div>
						   
						   <div class="form-group">
                              <label for="exampleInputEmail1">Attribuer une note</label>
                              <input type="number" name="note" id="note"  class="form-control" placeholder="valider une note"><!--retour ajax-->
                           </div>
						   
						   <div><?php 
						   $token = new Token();
						   echo'<input type="hidden" name="tokens" value="'.$token->getToken().'">';
						   ?></div><!--masque la varial token pour sécurité @crsf-->
                            
                           <div class="col-md-12 text-center ">
                              <input type="submit" name="submit" id="envoyer">

					</form>
				    <div><!--traitement du formulaire pour insertion des avis via le formlaire-->
					<?php
					
               if(isset($_POST['submit'])){
               // recupere les variables post du formulaire
			   // sécurisés les entrées des valeurs de types strig
               $nom = trim(strip_tags($_POST['nom']));// protéger les entrées
               $email = $_POST['email'];
               $message = trim(strip_tags($_POST['message']));
               $note = $_POST['note'];
			   $date = date('Y-m-d');//afficher la date actuel	
               // instancier la classe avis
			   $add = new Avis($nom,$email,$message,$note,$date);
			   // valider et insérer l'avis
               $add->createAvis($nom,$email,$message,$note,$date);
			   
			   }
					
					?>
					</div>
					</div>
						
                           
      
         
</body>
</html>
