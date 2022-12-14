<?php
  session_start();
  class AuthHelper{
    // This class should contain methods for signing up, in, and out a user.
    // Also, it contains methods for checking if the user is logged in and for
    // retrieving information about the authenticated user.

    // if(count($_POST)>0 && isset($_POST['action']{0})){
    //   if($_POST['action']=='signup'){
    //     signup();
    //   } elseif ($_POST['action']=='signin'){
    //     signin();
    //   } elseif ($_POST['action']=='signout'){
    //     signout();
    // }

    static function signup($file, $data){
      // verify existence of user register

      if(file_exists($file)){
        // check if email is already registered
        $tryEmail = $data['email'];
        $h=fopen($file, 'r+');
        while(!feof($h)){
          $line=explode(';',trim(fgets($h)));
          if(count($line)<2) continue;
          if($line[0]==$tryEmail) die($_SESSION['msg'] = "$tryEmail is already registered. Please sign in.");
          header('location:gateway.php');
        }
        fclose($h);
      }
      // 2. add email and hashed password to file
      $h=fopen($file, 'a+');
      fwrite($h,$data['email'].';'.$data['name'].';'.password_hash($data['pass'],PASSWORD_DEFAULT).PHP_EOL);
      // 3. close the file
      fclose($h);
      // 4. write a confirmation message and ask the user to sign in
      $_SESSION['name'] = $data['name'];
      header('location:goodtest.php');

    }

    static function signin($file, $data){
      $found = 'not';
      if(!file_exists($file)) {
        $_SESSION['msg'] ='The user is not registered';
        header('location:gateway.php');
      }
      // 1. verify whether the email is already registered
      $h=fopen($file, 'r+');
      $tryEmail = $data['email'];
      $tryPass = $data['pass'];
      while(!feof($h)){
        $line=explode(';',trim(fgets($h)));
        if(count($line)<2) continue;
        if($line[0]==$tryEmail){
          $found = 'found';
          // 2. verify password matches
          if(!password_verify($tryPass,$line[2])) {
            $_SESSION['msg'] = 'The password does not match.';
            header('location:gateway.php');
            die();

          }else{
            // start the session and send the user to the members page
            session_start();
            $_SESSION['name']=$line[1];
            header('location:goodtest.php');
          }
        }
      }
      fclose($h);
      if($found != 'found'){
        $_SESSION['msg'] = "$tryEmail is not registered. Did you use a different email?";
        header('location:gateway.php');
      }
    }



    static function signout(){
      if(isAuthenticated()=='logged'){
        session_destroy();
        session_start();
        $_SESSION['msg'] = "Logged out!";
        header('location:gateway.php');
      } else {
        $_SESSION['msg'] = "You never logged in.";
        header('location:gateway.php');
      }
    }

    private static function isAuthenticated(){
      $logged = 'logged';
      if(count($_SESSION)==0) {
        $logged = 'not';
        session_start();
        $_SESSION['msg'] = "You are not logged in.";
        header('location:gateway.php');
      } else {
        $_SESSION['msg'] = "You are logged in as a member.";
      }
      return $logged
    }

    private static function getUserInfo($file, $user, $field){
      $h=fopen($file, 'r+');
      while(!feof($h)){
        $line=explode(';',trim(fgets($h)));
        if(count($line)<2) continue;
        if($line[0]==$user) return $line[$field];
      }
      fclose($h);
      $_SESSION['msg'] = "Match not found for $user[$field]"
    }
  }


 ?>
