<?php
$path="";
$title="individual post";
include_once "includes/header.php";
include_once "includes/posts.php"; 
$post= new post();
if(isset($_GET['id'])){
    if(!ctype_digit($_GET['id'])|| empty($_GET['id'])){
        header('location:index.php');
    }else{
        $post->setPost_id(intval($_GET['id']));
        $check = $post->getById();
        if(mysqli_num_rows($check)==0){
            echo "the post doesn't exist";
        }else{
            $post_info = $post->getById();
            $post_info = mysqli_fetch_assoc($post_info);
        }
    }
}
?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <!-- Blog Post -->
            <!-- Title -->
            <h1><?php echo ucfirst($post_info['post_title']); ?></h1>
            <!-- Author -->
            <p class="lead">by <a href="#"><?php echo ucfirst($post_info['post_author']); ?></a></p>
            <hr>
            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_info['post_date']; ?> at  <?php echo date('h:i:s a', strtotime($post_info['created_at']));?></p>
            <hr>
            <!-- Preview Image -->
            <img class="img-responsive" src="images/<?php echo $post_info['post_image']; ?>" alt="post_image">
            <hr>
            <!-- Post Content -->
            <div><?php echo $post_info['post_content'];?></div>
            <hr>
            <!-- Blog Comments -->
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <hr>
            <!-- Posted Comments -->
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include_once "includes/sidebar.php";?>       
    </div>
    <!-- /.row -->
    <hr>
<?php include_once "includes/footer.php";?>