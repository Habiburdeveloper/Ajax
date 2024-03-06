<?php
require('link.php');
require('all-script.php');
$limit_per_page = 3;
$page = '';
if(isset($_POST['page_no'])){
    $page = $_POST['page_no'];
}
else{
    $page= 1;
}
$offset = ($page - 1) * $limit_per_page;
$query = "SELECT * FROM ajax LIMIT {$offset},{$limit_per_page}";

// $query = "SELECT * FROM ajax";
$sql =  mysqli_query($link, $query) or die('sorry');
// var_dump($sql);
// exit();
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

            $sql_total = "SELECT * FROM ajax";
            $query = mysqli_query($link, $sql_total);
            $total_rec = mysqli_num_rows($query);
            $total_page = ceil($total_rec/$limit_per_page);

            $output .= '<div class="col-12" id="pagination">';

            for($i = 1; $i <= $total_page; $i++){
                if( $i == $page){
                    $class_name = "active";
                }
                else{
                    $class_name = "";
                }
               
                $output .= "<li class='page-item {$class_name}'><a class='page-link' id='{$i}' href=''>{$i}</a></li>";
        

            }
            $output .= '</div>';

            
        echo $output;
}
else{
    echo 'sorrry';
}


?>