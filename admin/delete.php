<?php
    $path="../";
    include_once "../includes/posts.php";
    include_once "../includes/comments.php";
    $post = new post();
    $comment = new comment();
    if(isset($_GET['del'])){
        if(!ctype_digit($_GET['del'])|| empty($_GET['del'])){
            // header('location:admin');
        }else{
            $post->setPost_id(intval($_GET['del']));
            $check = $post->getById();
            if(mysqli_num_rows($check)==0){
                echo "the post doesn't exist";
            }else{
                $delete=$post->delete();
                if($delete=='done'){
                    header('location:posts.php');
                }else{
                    echo "$delete";
                }
            }
        }
    }
    if(isset($_GET['comment_id'])){
        if(!ctype_digit($_GET['comment_id'])|| empty($_GET['comment_id'])){
            // header('location:admin');
        }else{
            $comment->setComment_id(intval($_GET['comment_id']));
            $check = $comment->getCommById();
            if(mysqli_num_rows($check)==0){
                echo "the post doesn't exist";
            }else{
                $delete=$comment->delete();
                if($delete=='done'){
                    header('location:comments.php');
                }else{
                    echo "$delete";
                }
            }
        }
    }
?>