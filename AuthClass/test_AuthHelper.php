<?php
  require_once('AuthHelper.php');


  // This program contains tests for signing up, in, and out using AuthHelper.php
  // As well as, checking if the user is logged in and by
  // retrieving information about the authenticated user.

  //SIGNUP add some users to the members' csv file
  // AuthHelper::signup('users.csv',['email'=>'stewartM1@living.com','name'=>'Marty','pass'=>'n0tAxBL1ngThyme']); // new user registered
  // AuthHelper::signup('users.csv',['email'=>'ccbroadus420@snoopingg.com','name'=>'Mr. Dogg','pass'=>'m1nD0nMahMon3y']); // append new user registered
  // AuthHelper::signup('users.csv',['email'=>'ryryreynolds@mintmobz.org','name'=>'Deadpool','pass'=>'br34KinGaLltHeWalz']); // append new user registered
  // AuthHelper::signup('users.csv',['email'=>'ryryreynolds@mintmobz.org','name'=>'Deadpool','pass'=>'br34KinGaLltHeWalz']); // user already registered
  AuthHelper::signup('users.csv',['email'=>'jmonae@notmonet.com','name'=>'Janelle Monáe','pass'=>'n1V3sKutmeyeDr3s$']); // append new user registered



 ?>
