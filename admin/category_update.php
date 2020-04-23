<?php 
    include_once "../includes/admin_header.php"; 
    include_once "../includes/categories.php";
    $title = "Category Update";
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
                        $current;
                        if(isset($_GET['uid'])){
                            if(!ctype_digit($_GET['uid'])|| empty($_GET['uid'])){
                                // header('location:admin');
                            }else{
                                $cat->setCat_id(intval($_GET['uid']));
                                $current = $cat->search();
                                $current =mysqli_fetch_assoc($current);
                                $current =$current['cat_name'];
                            }
                        }
                    ?>
                    <?php 
                        if(isset($_POST['submit'])){
                            if(ctype_space($_POST['catName']) || empty($_POST['catName'])){
                                echo "<p class='alert alert-danger'>category name can't be empty</p>";
                            }else{
                                $cat->setCat_name($_POST['catName']);
                                $update=$cat->update();
                                if(strpos($update, 'uq_name') !== false){
                                    echo "<p class='alert alert-danger'>category name already exist</p>";
                                }else if(strpos($update, 'done') !== false){
                                    echo "<p class='alert alert-success'>category is updated successfully</p>";
                                    header('location:categories.php');
                                }else{
                                    echo "$update";
                                }
                            }
                        }
                    ?>
                    <form action="" method="post"> 
                        <div class="form-group">
                            <label for="catName">Category Name: </label>
                            <input type="text" id="catName" name="catName" value= "<?php echo $current;?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary form-group" value="update category" required>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>

