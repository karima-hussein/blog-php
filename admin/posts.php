<?php 
    $path="../";
    $title = "Posts";
    include_once "../includes/admin_header.php"; 
    include_once "../includes/posts.php";
    $post = new post();
?>
    <!-- Navigation -->
    <?php include_once "../includes/admin_nav.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin<small> <?php echo $title; ?></small></h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="#">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file"></i><?php echo " ".$title; ?></li>
                    </ol>
                </div>
                <div class="col-lg-12 table-responsive">
                    <table class="table table-hover table-striped ">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Image</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Category</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Status</th>
                                <th scope="col">Content</th>
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $results=$post->getAll();
                                $i=1;
                                while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo ucfirst($row['post_title']);?></td>
                                <td><?php echo ucfirst($row['post_author']);?></td>
                                <td><?php echo ucfirst($row['post_date']);?></td>
                                <td><?php echo ucfirst($row['created_at']);?></td>
                                <td><img width='100px' height='60px' src="../images/<?php echo $row['post_image'];?>"></td>
                                <td><?php echo ucfirst($row['post_comment_count']);?></td>
                                <td><?php echo ucfirst($row['cat_name']);?></td>
                                <td><?php echo ucfirst($row['post_tags']);?></td>
                                <td><span><?php echo ucfirst($row['post_status']);?></span></td>
                                <td><a class="btn btn-info" href="../post.php?id=<?php echo $row['post_id'];?>">view</a></td>
                                <td><a class="btn btn-info" href="publish_post.php?id=<?php echo $row['post_id'];?>">publish</a></td>
                                <td><a class="btn btn-danger" href="delete_post.php?del=<?php echo $row['post_id'];?>">Delete</a></td>
                                <td><a class="btn btn-warning" href="edit_post.php?uid=<?php echo $row['post_id'];?>">Edit</a></td>
                            </tr>
                                <?php  $i++;}?>   
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>

