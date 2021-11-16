<?php

 Class Token {
 
private $token; 
	
   public function getToken(){
   $rand_token = openssl_random_pseudo_bytes(16);
    //change binary to hexadecimal
    $data = bin2hex($rand_token);
    $this->token = $data;
	return $data;
  }	  
	 
 }

?>