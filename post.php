<?php
$path="";
$title="individual post";
include_once "includes/header.php";
include_once "includes/posts.php";
include_once "includes/comments.php"; 
$post= new post();
$comment = new comment();
$post_id;
if(isset($_GET['id'])){
    if(!ctype_digit($_GET['id'])|| empty($_GET['id'])){
        header('location:index.php');
    }else{
        $post_id =intval($_GET['id']);
        $post->setPost_id($post_id);
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
                <form role="form" method="post">
                    <?php 
                        if(isset($_POST['submit_comment'])){
                            if(ctype_space($_POST['comment_email']) || empty($_POST['comment_email'])){
                                echo "your email can't be empty";
                            }else if(ctype_space($_POST['comment_contnent']) || empty($_POST['comment_contnent'])){
                                echo "your comment can't be empty";
                            }else{
                                $comment->setComment_email($_POST['comment_email']);
                                $comment->setComment_content($_POST['comment_contnent']);
                                $comment->setComment_post_id($post_id);
                                $add = $comment->add();
                                if($add=='done'){
                                    header("location:post.php?id=$post_id");
                                }else{
                                    echo "$add";
                                }
                            }
                        }
                    ?>
                    <div class="form-group">
                    <label for="email">Your email:</label>
                        <input type="email" class="form-control" id="email" name="comment_email" placeholder="example@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Your comment:</label>
                        <textarea class="form-control" placeholder="what do you think?" id="comment" name="comment_contnent" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit_comment" class="btn btn-primary">Comment</button>
                </form>
            </div>
            <hr>
            <!-- Posted Comments -->
            <!-- Comment -->
            <?php
                $comment->setComment_post_id($post_id);
                $comments = $comment->viewAll();
                if(mysqli_num_rows($comments) == 0){
                    echo "<div class='media'><h4>This post has no comments yet!</h4></div>";
                }else{
                    while($c=mysqli_fetch_assoc($comments)){
            ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="image">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo explode('@',$c['comment_email'])[0];?>
                        <small><?php echo DATE('y-m-d',strtotime($c['created_at']))." at ".DATE('h:i:s',strtotime($c['created_at'])); ?></small>
                    </h4>
                    <?php echo $c['comment'];?>
                    <hr>
                </div>
            </div>
            <?php }}?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include_once "includes/sidebar.php";?>       
    </div>
    <!-- /.row -->
    <hr>
<?php include_once "includes/footer.php";?>