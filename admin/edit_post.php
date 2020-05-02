<?php 
    $title = "Edit post";
    $path  = "../";
    include_once "../includes/admin_header.php"; 
    include_once "../includes/categories.php";
    include_once "../includes/posts.php";
    $post = new post();
    $cat = new category();

?>
    <!-- Navigation -->
    <?php include_once "../includes/admin_nav.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <script>
                tinymce.init({
                    selector: '#mytextarea'
                });
            </script>
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
                        if(isset($_GET['uid'])){
                            if(!ctype_digit($_GET['uid'])|| empty($_GET['uid'])){
                                // header('location:admin');
                            }else{
                                $post->setPost_id(intval($_GET['uid']));
                                $check = $post->getById();
                                if(mysqli_num_rows($check)==0){
                                    echo "the post doesn't exist";
                                }else{
                                    $post_info = $post->getById();
                                    $post_info = mysqli_fetch_assoc($post_info);
                                }
                            }
                        }
                        if(isset($_POST['edit_submit'])){
                            $post->setPost_title($_POST['title']);
                            $post->setPost_author($_POST['author']);
                            $post->setPost_tags($_POST['tags']);
                            $post->setPost_category($_POST['category']);
                            $post->setPost_content($_POST['content']);
                            if(empty($_FILES['image']['name'])){
                                $post->setPost_image($post_info['post_image']);
                            }else{
                                $img_name= $_FILES['image']['name'];
                                $img_temp =$_FILES['image']['tmp_name'];
                                $des ="../images/$img_name";
                                $post->setPost_image($des);
                                move_uploaded_file($img_temp,$des);
                            }
                            $r=$post->update();
                            if($r='done'){
                                header('location:posts.php');
                                echo "done";
                            }else{
                                echo $r;
                            }
                        }
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" value="<?php echo $post_info['post_title'] ?>" class="form-control" id="title" placeholder="Enter title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" value="<?php echo $post_info['post_author']; ?>"id="author" placeholder="Enter author name" name="author" required>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <input type="text" class="form-control" value="<?php echo $post_info['post_tags']; ?>" id="tags" placeholder="Enter tags" name="tags" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="sel1" name="category" required>
                                <option selected>Choose category</option>
                                <?php
                                    $cats= $cat->getAll();
                                    while($row = mysqli_fetch_assoc($cats)){
                                ?>
                                <option value="<?php echo $row['cat_id'];?>" <?php if($post_info['cat_id']==$row['cat_id'])echo 'selected';?> ><?php echo $row['cat_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mytextarea">Content:</label>
                            <textarea class="form-control" rows="5" id="mytextarea" name="content" ><?php echo htmlentities($post_info['post_content']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <img src="<?php echo $post_info['post_image'];?>" width="100px" height="60px">
                        </div>
                        <div class="form-group">
                            <label for="image"> New image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" name="edit_submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>