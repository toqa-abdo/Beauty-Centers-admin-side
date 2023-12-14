<?php
include('conn.php');
$get = $_GET['id'];
$delete_data="DELETE FROM `requests` WHERE `id`='$get'";
$delete_data_query = mysqli_query($data,$delete_data);
if($delete_data_query)
{
    echo "<script>alert('Record Accepted')</script>";
    header('location: request.php');
}
else
{
    echo "<script>alert('Record Not Delete')</script>";
} 


?>