<?php
        include('conn.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
       
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="view.css">
</head>
<body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="view.php">Admin</a>

        <!-- Toggle button -->
     

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
      
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- Icons -->
            <!-- Notifications -->
            <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0">
                <a href="request.php"><i class='fa fa-user' style='color: white'></i></a> &nbsp;&nbsp;&nbsp;
                        <a href="charts.php"> <i class='fas fa-chart-bar' style='color: white'></i></a> &nbsp;&nbsp;&nbsp;
                        <a href="logout.php"><i class="fa fa-sign-out"  style='color: white'></i></a>
                       
                </li>
            </ul>
        </div>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
        <div class="container-fluid mt-3">
            <div class="card" >
                <div class="card-header bg-secondary  table-heading-container" >
                    <h1 class="table-heading  float-left text-light text-center text-black">View Table</h1>
                   <td> 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">

                                <form action="search.php" method="GET">
                                    <div class="input-group mb-3">
                                    <a href="crud.html" class="btn float-right d-inline-block btn-dark">Add Center</a> &nbsp;&nbsp;&nbsp;
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary d-inline-block btn-dark">Search</button>
                                        <!-- <a class="btn btn-primary d-inline-block btn-dark" >Search</a> -->
                                        
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div></td>
                </div>
                
                <div class="card-body table-heading-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Action</th>
                                
                              
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
        if(isset($_GET['search']))
        {
            $filtervalues = $_GET['search'];
            $query = "SELECT * FROM centers WHERE CONCAT(center_name) LIKE '%$filtervalues%' ";
            $query_run = mysqli_query($data, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                while($items=mysqli_fetch_array($query_run))
                //foreach($query_run as $items)
                {
                    ?>
                   
                            <tr>
                            <td><?php echo $items['center _id']  ?></td>
                                        <td><?php echo $items['center_name']  ?></td>
                                        <td><?php echo $items ['center_email']  ?></td>
                                        <td> 
                                            <img src="../Images/<?php if(isset($items['center_image'])){ echo $items['center_image'] ;}  ?>" alt="" width='50px' height='50px'>
                                        </td>
                                       
                                        <td><a href="delete.php?id=<?php echo $items['center _id']?>" class="btn btn-danger  text-black">Delete</a>
                                        </td>
                                </tr>

                       
                    
                    <?php
                }
            }
            else
            {
                ?>
                    <tr>
                        <td colspan="4">No Record Found</td>
                    </tr>
                <?php
            }
        }
    ?> 
     </tbody>
     </table>
        </div>
            </div>
</div>  
</body>
</html> 

