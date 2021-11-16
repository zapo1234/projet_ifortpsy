<?php

class Add extends Db {

 // insert un avis clients

 public function addAvis($nom,$email,$message,$note,$date) {
     $req = $this->database()->prepare('INSERT INTO avis (nom,email,message,note,date) VALUES(?,?,?,?,?)');
    if(!$req->execute(array($nom,$email,$message,$note,$date))){
        $req = null;
    }
     $req=null;

  }

 // tester l'existence d'un email dans la table avis 
 public function checkEmail($email) {
  $req = $this->database()->prepare('SELECT email FROM avis WHERE email= ?;');
  if(!$req->execute(array($email))){
        $req = null;
    }
    $result;
    if($req->rowCount() > 0) {
      $result = false;
    }
   else {
     $result=true;
    }
    return $result;
 }

// afficher la liste des  20 avis recents
// pour eventualité pagination

 public function listAvis() {
  $req = $this->database()->query('SELECT nom,email,message,note,date FROM avis LIMIT 0,20');
    
      if($req->rowCount() == 0) {
        $liste='';
      }
     else {
       $liste = $req->fetchAll(PDO::FETCH_ASSOC);
      }
      return $liste;
     }


// modifier un avis au cas ou email existe
public function udapteAvis($nom,$message,$note,$email){
  $req = $this->database()->prepare('UPDATE avis SET nom= ?, message=?, note=? WHERE email= ?;');
    if(!$req->execute(array($nom,
	                         $message,
	                         $note,
							$email))){
        $req = null;
    }
     $req=null;

}
// effectuer des recherches par date
 public function recherDate($date){
	$req = $this->database()->prepare('SELECT nom,email,message,note FROM avis WHERE date= ?;');
  if(!$req->execute(array($date))){
        $req = null;
    }
    $result;
    if($req->rowCount() == 0) {
      $result = false;
    }
   else {
     $result=$req->fetchAll();
    }
    return $result;
 }
// effectuer des recherches par note
public function recherNotes($note){
  $req = $this->database()->prepare('SELECT nom,email,message,note FROM avis WHERE note= ?;');
  if(!$req->execute(array($note))){
        $req = null;
    }
    $result;
    if($req->rowCount() == 0) {
      $result = false;
    }
   else {
     $result=$req->fetchAll();
    }
    return $result;

}

 // compter le nombre d'avis total
 public function countAvis(){
	 $req = $this->database()->query('SELECT count(*) AS nombre FROM avis');
     if(!$req) {
        $nombre='';
      }
     else {
       $nombre = $req;
      }
      return $nombre;
     } 
 }
?>