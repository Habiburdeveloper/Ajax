<?php
require('link.php');

$name = $_POST['name'];
$query = " SELECT * FROM ajax WHERE name LIKE '%$name%' or number LIKE '%$name%' ";
$sql =  mysqli_query($link, $query) or die('sorry');
$output = '';
if(mysqli_num_rows($sql) > 0){
    $output .= '<table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Number</th>
                <th scope="col">Action</th>
                </tr>
            </thead>';
            
            while($rows = mysqli_fetch_assoc($sql)){
                $output .="<tr> 
                    <td>{$rows["id"]}</td>
                    <td>{$rows["name"]}</td>
                    <td>{$rows["number"]}</td>
                    <td>
                        <button id='btnedit' data_id='{$rows["id"]}'>Edit</button>
                        <button id='btndelete' data_id='{$rows["id"]}'>Delete</button>
                    </td> 
                </tr>";
            }
            $output .="</table>"; 
            echo $output;
}
else{
    echo 'sorrry';
}

            


?>