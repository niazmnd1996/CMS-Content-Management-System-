<
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
                            <small>Auhtor's name</small>
                        </h1>
                       
                       
                       
                       
                       
                       
                       <div class="table-responsive">
                       
                       <?php
                           
                           if(isset($_GET['selected_comment_id']) && isset($_GET['current_status']))
                           {
                               if($_GET['current_status']=='approved')
                               {
                                   $query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id={$_GET['selected_comment_id']}";
                               }
                               else
                               {
                                     $query = "UPDATE comments SET comment_status='approved' WHERE comment_id={$_GET['selected_comment_id']}";
                               }
                               
                               
                               mysqli_query($connection,$query);
                               header("Location:comments.php");
                               
                               
                           }
                           
                           ?>
                       
                       <table class="table table-hover table-bordered" >
                           
                           <thead>
                               <tr>
                                   <th>In Response</th>
                                   <th>Author</th>
                                   <th>Email</th>
                                   <th>Body</th>
                                   <th>Status</th>
                                   <th>Date</th>
                               </tr>
                           </thead>
                           
                           
                           <tbody>
                              
                              
                              <?php
                               
                               $query = "SELECT * FROM comments";
                               $select_all_comment = mysqli_query($connection,$query);
                               while($row = mysqli_fetch_assoc($select_all_comment))
                               {
                                   
                                   $get_post_query = "SELECT * FROM posts WHERE post_id={$row['comment_post_id']}";
                                   $get_post_title = mysqli_query($connection,$get_post_query);
                                   $get_title = mysqli_fetch_assoc($get_post_title);
                                   
                                   
                                   ?>
                                   
                                   
                                   
                                   
                                   
                                   <tr>
                                   <td><?php echo $get_title['post_title']; ?></td>
                                   <td><?php echo $row['comment_author']; ?></td>
                                   <td><?php echo $row['comment_email']; ?></td>
                                   <td><?php echo $row['comment_content']; ?></td>
                                   <td><a href="comments.php?selected_comment_id=<?php echo $row['comment_id']; ?>&current_status=<?php echo $row['comment_status']; ?>"><?php echo $row['comment_status']; ?></a></td>
                                   <td><?php echo $row['comment_date']; ?></td>
                               </tr>
                                   
                                   
                                   <?php
                               }
                               
                               ?>
                              
                              
                               
                           </tbody>
                           
                       </table>
                       </div>
                       
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

     <?php include "includes/admin_footer.php"; ?>