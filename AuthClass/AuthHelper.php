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
          if($line[0]==$tryEmail) die($_SESSION['error_msg'] = "$tryEmail.' is already registered. Please sign in.'");
          // $_SESSION['error_msg'] = "$tryEmail.' is already registered. Please sign in.'";
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

  // static function signin(){
  //   if(!file_exists('data.csv')) die('The user is not registered');
  //   // 1. verify whether the email is already registered
  //   $h=fopen('data.csv', 'r+');
  //   while(!feof($h)){
  //     $line=explode(';',trim(fgets($h)));
  //     if(count($line)<2) continue;
  //     if($line[0]==$_POST['email']){
  //       if(!password_verify($_POST['pass'],$line[1])) {
  //         die ('The password is not correct');
  //       }else{
  //         // start the session and send the user to the members page
  //         session_start();
  //         $_SESSION['name']=$line[2];
  //         header('location: members.php');
  //       }
  //     }
  //   }
  //   fclose($h);
  //   die('The email address is not registered');
  //
  //   }



    // static function signout(){
    //   session_start();
    //   session_destroy();
    //   header('location:gateway.php')
    // }
    //
    // private static function isAuthenticated(){
    //   session_start();
    //   if(count($_SESSION)==0) header('location:gateway.php');
    // }
    //
    // funciton getUserInfo(){
    //
    // }
  }


 ?>
