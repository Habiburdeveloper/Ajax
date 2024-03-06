<?php
    require('link.php');
   
    $id  = $_POST['id'];
    $query = "DELETE FROM ajax WHERE id= '$id' ";
    $sql = mysqli_query($link, $query);
    if($sql){
       echo "Delete Done";
    }
    else{
        echo 'Sorry';
    }
    





?>