<?php
    $path="../";
    include_once "../includes/posts.php";
    $post =new post();
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
?>