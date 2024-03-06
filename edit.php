<?php

require('link.php');
   
    $id  = $_POST['id'];
    $query = "SELECT * FROM ajax WHERE id= '$id' ";
    $sql = mysqli_query($link, $query);
    $rows = mysqli_fetch_assoc($sql);
    echo json_encode($rows);


?>