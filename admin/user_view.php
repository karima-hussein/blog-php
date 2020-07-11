<?php 
    $path="../";
    $title = "users";
    include_once "../includes/admin_header.php"; 
    include_once "../includes/users.php";
    $user_obj = new user();
?>
    <!-- Navigation -->
    <?php include_once "../includes/admin_nav.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin<small> <?php echo $title; ?></small></h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file"></i><?php echo " ".$title; ?></li>
                    </ol>
                </div>
                <div class="col-lg-12 table-responsive">
                    <table class="table table-hover table-striped ">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">first name</th>
                                <th scope="col">last name</th>
                                <th scope="col">phone</th>
                                <th scope="col">email</th>
                                <th scope="col">image</th>
                                <!-- <th scope="col">role</th> -->
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $results=$user_obj->getAll();
                                $i=1;
                                $count=0;
                                while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo $row['user_name'];?></td>
                                <td><?php echo $row['user_first_name'];?></td>
                                <td><?php echo $row['user_last_name'];?></td>
                                <td><?php echo $row['user_phone'];?></td>
                                <td><?php echo $row['user_email'];?></td>
                                <td><img width='100px' height='60px' src="../images/users/<?php echo $row['user_image'];?>"></td>
                                <td><a class="btn btn-danger" href="delete.php?del=<?php echo $row['user_id'];?>">Delete</a></td>
                                <td><a class="btn btn-warning" href="edit.php?user_id=<?php echo $row['user_id'];?>">Edit</a></td>
                            </tr>
                                <?php  $i++;}?>   
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>

