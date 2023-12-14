<?php
        include('conn.php');
        if(isset($_POST['update_btn']))
        {
            $user_name= $_POST['name'];
            $user_id=$_POST['id'];
            $user_email= $_POST['email'] ;
            $user_pass= $_POST['pass'] ;
           
           
            $user_photo= $_FILES['profile']['name'];
            $user_temp= $_FILES['profile']['tmp_name'] ;
            $user_photo_folder= '../Images/'.$user_photo;
            $move= move_uploaded_file($user_photo_folder,$user_temp);

        

                if($user_photo!=''){
               
                    $update_data= "UPDATE `centers` SET `center_name`='$user_name',`center_email`='$user_email',`center_password`='$user_pass',`center_image`='$user_photo_folder' WHERE `center _id`='$user_id'";
                    
                  }
                  else
                  $update_data= "UPDATE `centers` SET `center_name`='$user_name',`center_email`='$user_email',`center_password`='$user_pass' WHERE `center _id`='$user_id'";
                    


            

            $update_data_query= mysqli_query($data,$update_data);
            if($update_data_query)
            {
                
                echo "<script>alert('Data Update')</script>";
                header('location: view.php');
               
            }
            else
            {
                echo "<script>alert('Data Not Update')</script>";
            }
        }
    ?>