 

<?php

if(isset($_POST['checkBoxArray']))
{
    foreach($_POST['checkBoxArray'] as $postValueId)
    {
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options)
        {
            case 'published':
                $query = "UPDATE posts SET post_status='{$bulk_options}' WHERE post_id={$postValueId}";
                $update_post = mysqli_query($connection,$query);
                confirmQuery($update_post);
                break;
                
                case 'draft':
                $query = "UPDATE posts SET post_status='{$bulk_options}' WHERE post_id={$postValueId}";
                $update_post = mysqli_query($connection,$query);
                confirmQuery($update_post);
                break;
                
                case 'delete':
                $query = "DELETE FROM posts WHERE post_id={$postValueId} ";
                $update_post = mysqli_query($connection,$query);
                confirmQuery($update_post);
                break;
                
                case 'clone':
                $query = "SELECT * FROM posts WHERE post_id='{$postValueId}'";
                $select_selected_posts = mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_selected_posts))
                {
                        $post_id = $row['post_id'];
                        $post_cat_id = $row['post_cat_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];
                }
                
                
                        $query = "INSERT INTO posts (post_cat_id,post_title,post_user,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
                        $query.=" VALUES ('$post_cat_id','$post_title','$post_author','$post_date', '$post_image' , '$post_content','$post_tags','$post_comment_count','$post_status')";

                        $insert_post = mysqli_query($connection,$query);

                        confirmQuery($insert_post);
                
                break;
        }
        
    }
}

?>


<form action="" method="post" >
    
    
    <div id="bulkOptionContainer" class="col-xs-4">
    <select name="bulk_options" class="form-control">
    <option value="">Select option</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
        <option value="clone">Clone</option>
        <option value="delete">Delete</option>
    </select>
        </div>
    
    <div class="col-xs-4">
    <input type="submit" value="Apply" name="submit" class="btn btn-primary" />
        <a href="posts.php?source=add_post" class="btn btn-primary">Add new post</a>
    </div>

<table class="table table-bordered table-hover" >

                <thead>
                <tr>
                    <th><input type="checkbox" id="selectAllCheckboxes" ></th>
                <th>ID</th>
                <th>Auhtor</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th></th>
                <th></th>
                <th></th>
                <th>Views</th>
                </tr>
                </thead>
                    
                    
                <tbody>
                    
                    
                    
                    <?php
                    
                    
                    $query = "SELECT * FROM posts ORDER BY post_id DESC ";
                    $select_all_posts = mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts))
                    {
                        $post_id = $row['post_id'];
                        $post_cat_id = $row['post_cat_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];
                        $post_views_count = $row['post_views_count'];
                        $post_user = $row['post_user'];
                        
                        
                        
                        echo "<tr>";
                        ?>
                    
                    <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id;?>" ></td>
                    
                    <?php
                        echo "<td>{$post_id }</td>";
                        
                        if(!empty($post_author))
                        {
                            echo "<td>{$post_author }</td>";
                        }
                        else
                        {
                            echo "<td>{$post_user }</td>";
                        }
                        
                        
                        
                        
                        echo "<td>{$post_title }</td>";
                        
                       
                        $query = "SELECT * FROM categories WHERE cat_id = '$post_cat_id'";
                        $get_cat_title = mysqli_query($connection,$query);
                        confirmQuery($get_cat_title);
                        while($row=mysqli_fetch_assoc($get_cat_title))
                        {
                            $cat_title = $row['cat_title'];
                            echo "<td>{$cat_title }</td>";
                        }
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        echo "<td>{$post_status }</td>";
                        echo "<td><img width='100' src='../images/{$post_image }' /></td>";
                        echo "<td>{$post_tags }</td>";
                        
                        $comment_query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                        $get_comment_count = mysqli_num_rows(mysqli_query($connection,$comment_query));
                        echo "<td><a href='post_comments.php?post_id={$post_id}'>{$get_comment_count }</a></td>";
                        echo "<td>{$post_date }</td>";
                        echo "<td><a onClick='return confirm(\"Are you sure to delete\")' href='posts.php?delete={$post_id}'>Delete</td>";
                        echo "<td><a href='../post.php?source=edit_post&p_id={$post_id}'>View post</td>";
                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</td>";
                        echo "<td>{$post_views_count}</td>";
                        echo "<td><a href='posts.php?reset={$post_id}'>Reset views</td>";
                        echo "</tr>";

                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    ?>
                    
                    
                    
                
                </tbody>



                </table>
    </form>


<?php


        if(isset($_GET['delete']))
        {
            $delete_post_id = $_GET['delete'];
            
            $query = "DELETE FROM posts WHERE post_id={$delete_post_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:posts.php");
            
        }




        if(isset($_GET['reset']))
        {
            $the_post_id = $_GET['reset'];
            $the_post_id = mysqli_real_escape_string($connection,$the_post_id);
            $the_post_id = stripslashes($the_post_id);
            $the_post_id = htmlspecialchars($the_post_id);
            
            $query = "UPDATE posts SET post_views_count=0 WHERE post_id = {$the_post_id}";
            mysqli_query($connection,$query);
            
            header("Location:posts.php");
            
            
        }






?>

                        