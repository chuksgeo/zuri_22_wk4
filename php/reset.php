<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $newpassword);
}

function resetPassword($email, $newpassword){

    checkifemailexist($email);
    
    $records = fopen('../storage/users.csv', "r");    
    while(($data = fgetcsv($records)) !== false) {

        if ($data[1] == $email){
            $data[2] = $newpassword; 

        }

        $new_data[] = $data; 
    }

    fclose($records);
      
    $file = fopen('../storage/users.csv', "w");
    foreach($new_data  as $key => $data){

        fputcsv($file, $data);
    }

    fclose($file);
    echo "Password updated successfully";
}

function checkifemailexist($email){    
    $records   = file('../storage/users.csv');

    foreach($records as $key => $record) {
        $data = str_getcsv($record);
        
        if ($data[1] == $email ){
            return true;
        }
    }
    exit("Invalid Email!!!");
}