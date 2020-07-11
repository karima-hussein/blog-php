<?php
    $path="../";
    include_once "../includes/posts.php";
    include_once "../includes/comments.php";

    //objects
    $post =new post();
    $comment = new comment();


    //approve posts
    if(isset($_GET['id'])){
        if(!ctype_digit($_GET['id'])|| empty($_GET['id'])){
            // header('location:post.php');
        }else{
            $post->setPost_id(intval($_GET['id']));
            $check = $post->getById();
            if(mysqli_num_rows($check)==0){
                echo "the post doesn't exist";
            }else{
               $approve =$post->publish();
               if($approve='done'){
                header('location:posts.php');
                echo 'done';
               }else{
                   echo $approve;
               }
            }
        }
    }
    //approve comments
    if(isset($_GET['comment_id'])){
        if(!ctype_digit($_GET['comment_id'])|| empty($_GET['comment_id'])){
            // header('location:post.php');
        }else{
            $comment->setComment_id(intval($_GET['comment_id']));
            $check = $comment->getCommById();
            if(mysqli_num_rows($check)==0){
                echo "the post doesn't exist";
            }else{
               $approve = $comment->publish_comment();
               if($approve='done'){
                header('location:comments.php');
                echo 'done';
               }else{
                   echo $approve;
               }
            }
        }
    }
    //approve users
    
?>