<?php
$title="search";
$path="";
 include_once "includes/header.php";
 include_once "includes/posts.php"; 
 $ob = new post();
 ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">Page Heading<small>Secondary Text</small></h1>
                <!-- First Blog Post -->
                <?php 
                    if(!isset($_POST['search-submit'])){
                        echo "<h1>No search queries have been requested</h1>";
                    }else{
                       $ob->setKey($_POST['search']);
                       $posts = $ob->search();
                    
                    if(mysqli_num_rows($posts)==0){
                        echo "<h1>No results was found</h1>";
                    }else{
                    while($row = mysqli_fetch_assoc($posts)){
                ?>
                <h2><a href="#"><?php echo ucfirst($row['post_title']);?></a></h2>
                <p class="lead">by <a href="#"><?php echo ucfirst($row['post_author']);?></a></p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'];?> at <?php echo date('h:i:s a', strtotime($row['created_at']));?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $row['post_image'];?>" alt="">
                <hr>
                <p><?php echo $row['post_content'];?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                    <?php }}}?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php include_once "includes/sidebar.php";?>       
        </div>
        <!-- /.row -->
<?php include_once "includes/footer.php";?>
