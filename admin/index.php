<?php include "includes/admin_header.php"; ?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        
        
        
        
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                
                
                
                
                
                
                
                
                
                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                        $query = "SELECT * FROM posts";
                        $select_post = mysqli_query($connection,$query);
                        $num_of_posts = mysqli_num_rows($select_post);
                        ?>
                  <div class='huge'><?php echo $num_of_posts; ?></div>
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
                        <?php 
                        $query = "SELECT * FROM comments";
                        $select_comments = mysqli_query($connection,$query);
                        $num_of_comments = mysqli_num_rows($select_comments);
                        ?>
                     <div class='huge'><?php echo $num_of_comments; ?></div>
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
                        <?php 
                        $query = "SELECT * FROM users";
                        $select_users = mysqli_query($connection,$query);
                        $num_of_users = mysqli_num_rows($select_users);
                        ?>
                    <div class='huge'><?php echo $num_of_users; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
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
                        <?php 
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection,$query);
                        $num_of_categories = mysqli_num_rows($select_categories);
                        ?>
                        <div class='huge'><?php echo $num_of_categories; ?></div>
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
                
                
                
                
                
                
                
                <?php
                
                $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                $select_all_draft_posts = mysqli_query($connection,$query);
                $num_of_draft_post = mysqli_num_rows($select_all_draft_posts);
                
                $query = "SELECT * FROM posts WHERE post_status = 'published'";
                $select_all_published_posts = mysqli_query($connection,$query);
                $num_of_published_post = mysqli_num_rows($select_all_published_posts);
                
                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                $select_all_unapproved_comments = mysqli_query($connection,$query);
                $num_of_upapproved_comments = mysqli_num_rows($select_all_unapproved_comments);
                
                $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $select_all_subscriber = mysqli_query($connection,$query);
                $num_of_subscribers = mysqli_num_rows($select_all_subscriber);
                
                ?>
                
                
                
                
                
                
                
                
                
                <div class="row">
                    
                    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
            
            $element_text = ['All posts','Active posts','Draft Posts','Comments','Upapproved Comments','Users','Subscribers','Categories'];
            $element_count = [$num_of_posts,$num_of_published_post,$num_of_draft_post,$num_of_comments,$num_of_upapproved_comments,$num_of_users,$num_of_subscribers,$num_of_categories];
            
            for($i=0; $i<8; $i++)
            {
                echo "['{$element_text[$i]}', $element_count[$i]],";
            }
            
            
            
            ?>
            
        ]);

        var options = {
          chart: {
            title: 'CMS Record',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                    
                    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
                    
                </div>
                
                
                
                
                
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

     <?php include "includes/admin_footer.php"; ?>