 <table class="table table-bordered table-hover" >

                <thead>
                <tr>
                <th>ID</th>
                <th>Auhtor</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>In response to</th>
                <th>Date</th>
                <th>Approved</th>
                <th>Unapproved</th>
                <th>Delete</th>
                </tr>
                </thead>
                    
                    
                <tbody>
                    
                    
                    
                    <?php
                    
                    
                    $query = "SELECT * FROM comments";
                    $select_all_comments = mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_comments))
                    {
                        $comment_id = $row['comment_id'];
                        $comment_post_id= $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content= $row['comment_content'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                        
                        
                        
                        echo "<tr>";
                        echo "<td>{$comment_id}</td>";
                        echo "<td>{$comment_author}</td>";
                        echo "<td>{$comment_content}</td>";
                        
                       /*
                        $query = "SELECT * FROM categories WHERE cat_id = '$post_cat_id'";
                        $get_cat_title = mysqli_query($connection,$query);
                        confirmQuery($get_cat_title);
                        while($row=mysqli_fetch_assoc($get_cat_title))
                        {
                            $cat_title = $row['cat_title'];
                            echo "<td>{$cat_title }</td>";
                        }
                        */
                        
                        
                        
                        echo "<td>{$comment_email}</td>";
                        echo "<td>{$comment_status}</td>";
                        
                        
                        $query = "SELECT * FROM posts WHERE post_id =$comment_post_id ";
                        $select_post_title = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($select_post_title))
                        {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            
                            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                        }
                        
                        
                        
                        
                        
                        
                        
                        echo "<td>{$comment_date}</td>";
                        
                        echo "<td><a href='comments.php?approve={$comment_id}'>Approved</td>";
                        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapproved</td>";
                        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</td>";
                        echo "</tr>";

                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    ?>
                    
                    
                    
                
                </tbody>



                </table>


<?php






if(isset($_GET['unapprove']))
        {
            $approve_comment_id = $_GET['unapprove'];
            
            $query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id={$approve_comment_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:comments.php");
            
        }






if(isset($_GET['approve']))
        {
            $approve_comment_id = $_GET['approve'];
            
            $query = "UPDATE comments SET comment_status='approved' WHERE comment_id={$approve_comment_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:comments.php");
            
        }





        if(isset($_GET['delete']))
        {
            $delete_comment_id = $_GET['delete'];
            
            $query = "DELETE FROM comments WHERE comment_id={$delete_comment_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:comments.php");
            
        }


?>

                        