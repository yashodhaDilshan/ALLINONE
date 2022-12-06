<?php 
include("dbconnect.php");



if(isset($_GET['category_id']))
{
    $CategoryId =  $_GET['category_id'];

    $sql = "SELECT * FROM sub WHERE Cid = '$CategoryId' ";
    $result = mysqli_query($conn, $sql);

    $SubCategory_list = "";

    while($row = mysqli_fetch_assoc($result))
    {
        $SubCategory_list .= "<option value = \"{$row['SId']}\"> {$row['SubName']} </option>";
    }
    echo $SubCategory_list;
}
else{
    echo "<option>Error</option>";
}





?>