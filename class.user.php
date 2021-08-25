<?php

 class User {
 
  function __construct($dbh) {
  
   $this->dbh = $dbh;
   
  }
  
  public function login($username, $password) {
  
   $sth = $this->dbh->prepare('SELECT password FROM users WHERE username = :username LIMIT 1');
   
   $sth->bindParam(':username', $username, PDO::PARAM_STR);
   
   $sth->execute();
   
   $row = $sth->fetch(PDO::FETCH_ASSOC);
   
   if($row && password_verify($password, $row['password']) === true) {
   
    return true;
    
   }
   
   else return false;
   
  }
  
  public function user_exist($username, $email) {
  
   $sth = $this->dbh->prepare('SELECT id FROM users WHERE username = :username OR email = :email LIMIT 1');
   
   $sth->bindParam(':username', $username, PDO::PARAM_STR);
   $sth->bindParam(':email', $email, PDO::PARAM_STR);
   
   $sth->execute();
   
   return $sth->fetch(PDO::FETCH_ASSOC);
   
  }
  
  public function insert_user($username, $email, $password, $ip) {
  
   $sth = $this->dbh->prepare("INSERT INTO users (username, email, password, ip) VALUES( :username, :email, :password, :ip)");
   $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
   
   $sth->bindParam(':username', $username, PDO::PARAM_STR);
   $sth->bindParam(':email', $email, PDO::PARAM_STR);
   $sth->bindParam(':password', $password, PDO::PARAM_STR);
   $sth->bindParam(':ip', $ip, PDO::PARAM_STR);

   return $sth->execute();
   
  }
  
 }