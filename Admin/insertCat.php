<?php
        include('conn.php');
        if(isset($_POST['sub_btn']))
        {
            $user_name= $_POST['name'];
          
            $user_photo= $_FILES['user_profile']['name'] ;
            $user_temp= $_FILES['user_profile']['tmp_name'] ;
            $user_photo_folder= '../Images/'.$user_photo;
            $move= move_uploaded_file($user_temp, $user_photo_folder);
            $db=new mysqli('localhost','root','','graduatin_project');

            if( $user_name== null ||  $user_photo== null ){
                echo "<script>alert('one of information not inserted')</script>"; 
            }
            else{
            $result = $data->query("SELECT * FROM `categore` WHERE `categore_name`  = '$user_name'");
            if($result->num_rows == 0) {
                 // row not found, do stuff...
                 $insert_data= "INSERT INTO `categore`( `categore_name`,  `categore_image`) 
                 VALUES ('$user_name', '$user_photo_folder' )";
                
                 $db->query( $insert_data);
                $db->commit();
                $db->close();
                 if($insert_data)
                {
                    echo "<script>alert('Data Inserted')</script>";
                    header('location: view.php');
                }
                else
                {
                    echo "<script>alert('Data Not Inserted')</script>";
                }
            } else {
                // do other stuff...
                echo "<script>alert('This Category is already exists')</script>";
            }
        
            
        }}
    ?>