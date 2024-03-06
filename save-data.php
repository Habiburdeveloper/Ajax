<?php

   require('link.php');
    $id = $_POST['id'];
    $name  = $_POST['name'];
    $Phone_Number  = $_POST['phone_number'];
    $query = "INSERT INTO ajax(id, name, number)
             VALUES ('$id','$name', '$Phone_Number') ON Duplicate key update name='$name',number='$Phone_Number' ";
    $sql = mysqli_query($link, $query);

    if($sql){
       echo "Insert Done";
    }
    else{
        echo 'failde';
    }
    

?>