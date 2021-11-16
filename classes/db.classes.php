<?php

class Db {

 public function database() {
 
  try
    {
   $username ="root";
   $password="";
   $db = $bds = new PDO('mysql:host=localhost;dbname=test_ifortypsy', $username,$password);
   return $db;
    }

  catch(Exception $e)
  {
 die('Erreur : '.$e->getMessage());
 }  
 
}

}

?>