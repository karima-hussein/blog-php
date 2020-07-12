<?php 
    $path  = "../";
    $title = 'Edit user';
    include_once "../includes/admin_header.php"; 
    include_once "../includes/users.php";
    $userObj = new user();
?>
    <!-- Navigation -->
    <?php include_once "../includes/admin_nav.php";?>
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
                    <?php 
                        //getting user info by id
                        if(isset($_GET['user_id'])){
                            if(!ctype_space($_GET['user_id']) || !empty($_GET['user_id']) || ctype_digit($_GET['user_id'])){
                                //use id 
                                $userObj->setUser_id(intval($_GET['user_id']));
                                if(mysqli_num_rows($userObj->getUserById())==0){
                                    // header('location:404.php');                                    
                                }else{
                                    $user_info=mysqli_fetch_assoc($userObj->getUserById());
                                }
                            }else{
                                // header('location:404.php');                                
                            }
                        }else{
                            // header('location:404.php');
                        }
                    ?>
                    <?php
                        // submit changes
                        if(isset($_POST['edit_submit'])){
                            $userName=$_POST['user_name'];
                            $fname=$_POST['fname'];
                            $lname=$_POST['lname'];
                            $email=$_POST['user_email'];
                            $phone=$_POST['user_phone'];
                            $role=$_POST['role'];
                            //image
                            $image;
                            $img_name= $_FILES['image']['name'];
                            $img_temp =$_FILES['image']['tmp_name'];
                            if($_FILES['image']['size'] == 0 || $_FILES['image']['error'] == 4){
                                $image=$user_info['user_image'];
                            }else{
                                $des ="../images/users/$img_name";
                                $image=$img_name;
                                move_uploaded_file($img_temp,$des);
                            }

                            $userObj->setUsername($userName);
                            $userObj->setFname($fname);
                            $userObj->setLname($lname);
                            $userObj->setUser_email($email);
                            $userObj->setUser_phone($phone);
                            $userObj->setUser_role($role);
                            $userObj->setUser_image($image);
                            $update=$userObj->update();
                            if($update =='done'){
                                echo 'user information has been updated ';
                                header("refresh:2 ; url=user_view.php");
                            }else if(strpos($update,'user_email')){
                                echo 'this email already exists';
                            }else if(strpos($update,'user_name')){
                                echo 'this username already exists';
                            }else{
                                echo $update;
                            }
                            
                        }
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fname">First name:</label>
                            <input type="text" value="<?php echo $user_info['user_first_name']; ?>" class="form-control" id="fname" placeholder="Enter user's first name" name="fname" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last name:</label>
                            <input type="text" value="<?php echo $user_info['user_last_name']; ?>" class="form-control" id="lname" placeholder="Enter user's last name" name="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="user_name">Username:</label>
                            <input type="text" class="form-control" value="<?php echo $user_info['user_name']; ?>"id="user_name" placeholder="Enter the username " name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="user_mail">Email:</label>
                            <input type="email" class="form-control" value="<?php echo $user_info['user_email']; ?>"id="user_email" placeholder="Enter user's email address" name="user_email" required>
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Phone number:</label>
                            <input type="text" class="form-control" value="<?php echo $user_info['user_phone']; ?>"id="user_phone" placeholder="Enter user's phone" name="user_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" >Choose role</option>
                                <option value="user" <?php if($user_info['user_role']=='user') echo "selected"; ?> >user</option>
                                <option value="admin" <?php if($user_info['user_role']=='admin') "selected"; ?> >admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">current image:</label>
                            <img src="../images/users/<?php echo $user_info['user_image'];?>" heigh="100px" width="100px">
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit"name="edit_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>

