<?php 
    $title='Dashboard';
    $path="../";
    include_once "../includes/admin_header.php"; 
    include_once "../includes/admin_nav.php"; 
    include_once "../includes/categories.php"; 
    include_once "../includes/posts.php"; 
    include_once "../includes/users.php"; 
    include_once "../includes/comments.php"; 

    $userObj= new user();
    $commentObj = new comment();
    $postObj = new post();
    $catObj = new category();
    
    $catCount = mysqli_fetch_row($catObj->count())[0];
    $commentCount = mysqli_fetch_row($commentObj->count())[0];
    $postCount = mysqli_fetch_row($postObj->count())[0];
    $userCount = mysqli_fetch_row($userObj->count())[0];
    
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Dashboard</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file"></i> Main page </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
        </div>
        
        <!-- /.container-fluid -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $postCount;?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $commentCount;?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $userCount;?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="user_view.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $catCount;?></div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- chart -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['components', 'counts'],
                //getting value with php
                <?php
                    $component=['posts','comments','users','categories'];
                    $counts=[$postCount,$commentCount,$userCount,$catCount];
                    for($i=0;$i < sizeof($component);$i++){
                        echo "['$component[$i]', $counts[$i]],";
                    }
                 ?>
                ]);

                var options = {
                chart: {
                    title: 'Components stats',
                    subtitle: '',
                }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    </div>
    <!-- /#page-wrapper -->
<?php include_once "../includes/admin_footer.php"; ?>