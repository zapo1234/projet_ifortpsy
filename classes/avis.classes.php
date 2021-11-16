<?php

class Avis {

private $nom;
private $email;
private $message;
private $note;
private $date;
private $token;


public function __construct($nom,$email,$message,$note,$date) 

{
   $this->nom = $nom;
   $this->email = $email;
   $this->message = $message;
   $this->note = $note;
   $this->date = $date;

}
// afficher les erreur du formulaire adjout avant insert  
// filtre sur  les entrées sur les regex email et note , longueur des message
// tester l'exsitence d'un user existant via sont email
// insert to l'avis 
public function createAvis($nom,$email,$message,$note,$date){
// instancier 
 $add = new Add();
 // recupére l'email s'il existe
 $emails =  $add->checkEmail($this->email);
  if(empty($this->nom) || empty($this->email) || empty($this->note)){
  echo'tous les champs sont à remplir';
}
 elseif(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
  echo'votre mail est invalide';
}

 elseif(!preg_match("/^[1-6]*$/", $this->note)){
	 echo'la note est comprise entre 1 et 5';
 }
 
 elseif(strlen($this->message)>200){
	 echo'le nombre de caractères de l\'avis est moins de 200';
 }
 // verifier si l'email de l'utilisateur est présent deja dans la base
 // on modifie les données de l'utilisateur existant
 elseif(!$emails){
 // modifier les données
 $add->udapteAvis($nom,$message,$note,$email);
  // afficher le resultats et verifier dans la liste la modification est bien effectué
  echo'ce utilisateur existe, ses données sont bien modifiées'; 
 }
 else{
 
 // inserer après verification les données avis dans la table
 $add->addAvis($nom,$email,$message,$note,$date);

 // rediriger vers la page qui liste les avis lors du succès de la requete
 header('Location:listes.php');
 }
}

}

?>