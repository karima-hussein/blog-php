<?php 
    $path="../";
    $title = "Categories";
    include_once "../includes/admin_header.php"; 
    include_once "../includes/categories.php";
    $cat = new category();
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
                <div class="col-lg-6">
                    <?php 
                        if(isset($_POST['submit'])){
                            if(ctype_space($_POST['catName']) || empty($_POST['catName'])){
                                echo "<p class='alert alert-danger'>category name can't be empty</p>";
                            }else{
                                $cat->setCat_name($_POST['catName']);
                                $add=$cat->add();
                                if(strpos($add, 'uq_name') !== false){
                                    echo "<p class='alert alert-danger'>category name already exist</p>";
                                }else if(strpos($add, 'done') !== false){
                                    echo "<p class='alert alert-success'>category is added successfully</p>";
                                }else{
                                    echo "$add";
                                }
                            }
                        }
                    ?>
                    <form action="" method="post"> 
                        <div class="form-group">
                            <label for="catName">Category Name: </label>
                            <input type="text" id="catName" name="catName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary form-group" value="Add category" required>
                        </div>
                    </form>
                </div>
                <?php
                    if(isset($_GET['id'])){
                        if(!ctype_digit($_GET['id']) || empty($_GET['id'])){
                            header('location:admin');
                        }else{
                            $cat->setCat_id(intval($_GET['id']));
                            $check = $cat->search();
                            if(mysqli_num_rows($check)>0){
                                $delete=$cat->delete();
                                if($delete =='done'){
                                    header('location:categories.php');
                                }else{
                                    echo $delete;
                                }
                            }else{
                                header('location:categories.php');
                            }
                        }
                    }
                ?>
                <div class="col-lg-12 table-responsive">
                    <table class="table table-hover table-striped" id="myTable">
                        <thead class="bg-info">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $results=$cat->getAll();
                                $i=1;
                                while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo ucfirst($row['cat_name']);?></td>
                                <td>
                                    <a class="btn btn-danger" href="categories.php?id=<?php echo $row['cat_id'];?>">Delete</a>
                                    <a class="btn btn-warning" href="category_update.php?uid=<?php echo $row['cat_id'];?>">Edit</a>
                                </td>
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


