<?php 
    $title = "Add post";
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
                        if(isset($_POST['post_submit'])){
                            $post->setPost_title($_POST['title']);
                            $post->setPost_author($_POST['author']);
                            $post->setPost_tags($_POST['tags']);
                            $post->setPost_category($_POST['category']);
                            $post->setPost_content($_POST['content']);
                            $img_name= $_FILES['image']['name'];
                            $img_temp =$_FILES['image']['tmp_name'];
                            $des ="../images/$img_name";
                            $post->setPost_image($img_name);
                            move_uploaded_file($img_temp,$des);
                            $r=$post->add();
                            if($r='done'){
                                echo 'your post has been added';
                                header('refresh:3; url=posts.php');
                            }else{
                                echo $r;
                            }
                        }
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" value="<?php echo isset($_POST["title"]) ? $_POST["title"] : ''; ?>" class="form-control" id="title" placeholder="Enter title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" value="<?php echo isset($_POST["author"]) ? $_POST["author"] : ''; ?>"id="author" placeholder="Enter author name" name="author" required>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <input type="text" class="form-control" value="<?php echo isset($_POST["tags"]) ? $_POST["tags"] : ''; ?>" id="tags" placeholder="Enter tags" name="tags" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="sel1" name="category" required>
                                <option value="" selected>--choose category--</option>
                                <?php
                                    $cats= $cat->getAll();
                                    while($row = mysqli_fetch_assoc($cats)){
                                ?>
                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mytextarea">Content:</label>
                            <textarea class="form-control" rows="5" id="mytextarea" name="content" ><?php echo isset($_POST["content"]) ? htmlentities($_POST["content"]) : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <button type="submit" name="post_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>

