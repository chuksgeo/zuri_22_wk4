<?php
if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  loginUser($email, $password);
}

function loginUser($email, $password){
  /*
      Finish this function to check if username and password 
  from file match that which is passed from the form
  */
  $records   = file('../storage/users.csv');

  foreach($records as $key => $record) {
    $data = str_getcsv($record);

    if ($data[1] == $email && $data[2] == $password){

      session_start();
      $_SESSION["loggedIn"] = true;
      $_SESSION["username"] = $data[0];
      header("Location: ../dashboard.php");
      exit;
    }
  }
  exit("Invalid Credentials!!!");
}


