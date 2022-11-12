<?php

if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
    echo "User Successfully registered!!!";
}
else{
    echo "User registration unsuccessful, contact administrator!!!";
}

function registerUser($username, $email, $password){
    $data = array();
    $data['username'] = $username;
    $data['email'] = $email;
    $data['password'] = $password;
    $file = fopen('../storage/users.csv', "a");    
    $content = fputcsv($file, $data);
    fclose($file);
}


