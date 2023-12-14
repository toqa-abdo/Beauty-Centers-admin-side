<?php
        include('conn.php');
        $get = $_GET['id'];
        $delete_data="DELETE FROM `centers` WHERE `center _id`='$get'";
        $delete_data_query = mysqli_query($data,$delete_data);
        if($delete_data_query)
        {
            echo "<script>alert('Record Delete')</script>";
            header('location: view.php');
        }
        else
        {
            echo "<script>alert('Record Not Delete')</script>";
        } 
    ?>