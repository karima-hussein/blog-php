<?php 
    $path  = "../";
    $title = 'add user';
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
                        if(isset($_POST['user_submit'])){
                            $userName=$_POST['user_name'];
                            $pass=$_POST['password'];
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
                                $image='default.png';
                            }else{
                                $des ="../images/users/$img_name";
                                $image=$img_name;
                                move_uploaded_file($img_temp,$des);
                            }

                            $userObj->setUsername($userName);
                            $userObj->setUser_pass($pass);
                            $userObj->setFname($fname);
                            $userObj->setLname($lname);
                            $userObj->setUser_email($email);
                            $userObj->setUser_phone($phone);
                            $userObj->setUser_role($role);
                            $userObj->setUser_image($image);
                            $add=$userObj->add();
                            if($add =='done'){
                                echo 'user has been added ';
                            }else if(strpos($add,'user_email')){
                                echo 'this email already exists';
                            }else if(strpos($add,'user_name')){
                                echo 'this username already exists';
                            }else{
                                echo $add;
                            }
                            
                        }
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fname">First name:</label>
                            <input type="text" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>" class="form-control" id="fname" placeholder="Enter your first name" name="fname" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last name:</label>
                            <input type="text" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>" class="form-control" id="lname" placeholder="Enter your last name" name="lname" required>
                        </div>
                        <div class="form-group">
                            <label for="user_name">Username:</label>
                            <input type="text" class="form-control" value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>"id="user_name" placeholder="Enter your username " name="user_name" required>
                        </div>
                        <div class="form-group">
                            <label for="user_mail">Email:</label>
                            <input type="email" class="form-control" value="<?php echo isset($_POST["user_email"]) ? $_POST["user_email"] : ''; ?>"id="user_email" placeholder="Enter your email address" name="user_email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>" class="form-control" id="password" placeholder="Enter your password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Phone number:</label>
                            <input type="text" class="form-control" value="<?php echo isset($_POST["user_phone"]) ? $_POST["user_phone"] : ''; ?>"id="user_phone" placeholder="Enter your userphone" name="user_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" selected>Choose role</option>
                                <option value="user" >user</option>
                                <option value="admin" >admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit"name="user_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>

