<?php
    $path="../";
    include_once "../includes/posts.php";
    $post =new post();
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
?>