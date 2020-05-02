<?php
$path="";
$title="Blog";
include_once "includes/header.php";
include_once "includes/categories.php"; 
$cat = new category();
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">Page Heading<small>Secondary Text</small></h1>
                <!-- First Blog Post -->
                <?php
                    $posts; 
                    if(isset($_GET['cat_id'])){
                        if(!ctype_digit($_GET['cat_id']) || empty($_GET['cat_id'])){
                            header('location:index.php');
                        }else{
                            $cat->setCat_id(intval($_GET['cat_id']));
                            $check = $cat->search();
                            if(mysqli_num_rows($check)==0){
                                header('location:index.php');
                            }else{
                                $posts = $cat->getByCatId();
                            }
                        }
                    if(mysqli_num_rows($posts) == 0){
                        echo "<h2>this category has no posts yet</h2>";
                    }else{
                    while($row = mysqli_fetch_assoc($posts)){
                ?>
                <h2><a href="post.php?id=<?php echo $row['post_id'];?>"><?php echo ucfirst($row['post_title']);?></a></h2>
                <p class="lead">by <a href="#"><?php echo ucfirst($row['post_author']);?></a></p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'];?> at <?php echo date('h:i:s a', strtotime($row['created_at']));?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $row['post_image'];?>" alt="">
                <hr>
                <p><?php echo substr($row['post_content'],0,250)."....";?></p>
                <a class="btn btn-primary" href="post.php?id=<?php echo $row['post_id'];?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                    <?php }}}?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include_once "includes/sidebar.php";?>       
        </div>
        <!-- /.row -->
<?php include_once "includes/footer.php";?>
