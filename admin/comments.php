<?php 
    $path="../";
    $title = "Comments";
    include_once "../includes/admin_header.php"; 
    include_once "../includes/comments.php";
    $comment = new comment();
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
                                <th scope="col">Email</th>
                                <th scope="col">Content</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">post_id</th>
                                <th scope="col">Status</th>
                                <th scope="col" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $results = $comment->getAll();
                                $i=1;
                                while($row = mysqli_fetch_assoc($results)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i;?></th>
                                <td><?php echo ucfirst($row['comment_email']);?></td>
                                <td><?php echo ucfirst($row['comment']);?></td>
                                <td><?php echo date("y-m-d", strtotime($row['created_at']));?></td>
                                <td><?php echo date("h:i:s", strtotime($row['created_at']));?></td>
                                <td><?php echo ucfirst($row['comment_post_id']);?></td>
                                <td><span><?php echo ($row['comment_status']);?></span></td>
                                <td><a class="btn btn-info" href="publish.php?comment_id=<?php echo $row['comment_id'];?>">publish</a></td>
                                <td><a class="btn btn-danger" href="delete.php?comment_id=<?php echo $row['comment_id'];?>">Delete</a></td>
                                <td><a class="btn btn-warning" href="edit.php?comment_id=<?php echo $row['comment_id'];?>">Edit</a></td>
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

