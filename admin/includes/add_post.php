 


<form action="" method="post" enctype="multipart/form-data" >

    
    
    
    
    <?php
    
    if(isset($_POST['create_post']))
    {
        $post_title = $_POST['post_title'];
        $post_cat_id = $_POST['post_cat_id'];
        $post_user = $_POST['post_user'];
        $post_status = $_POST['post_status'];
        
        $post_image=$_FILES['post_image']['name'];
        $post_image_temp=$_FILES['post_image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 0;
        
        $date = date("d")."-".date("m")."-".date("y");
        
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        
        $query = "INSERT INTO posts (post_cat_id,post_title,post_user,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
        $query.=" VALUES ('$post_cat_id','$post_title','$post_user','$date', '$post_image' , '$post_content','$post_tags','$post_comment_count','$post_status')";
        
        $insert_post = mysqli_query($connection,$query);
        
        confirmQuery($insert_post);
        
        $the_post_id = mysqli_insert_id($connection);
        
        if($insert_post)
        {
            echo "<p class='bg-succes'>Post added. <a href='../post.php?p_id={$the_post_id}'>View post</a> | <a href='posts.php'>View all posts</a></p>";
        }
        
        
        
    }
    
    ?>
    
    
    
    
    

    <div class="form-group">
    <label for="title">Post title</label>
        <input type="text" name="post_title" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="category">Post category</label>
        
        
        <select name="post_cat_id" id="" >
            
            <?php
            
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query);
            confirmQuery($select_categories);
            while($row=mysqli_fetch_assoc($select_categories))    
            {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo "<option value='$cat_id'>$cat_title</option>";
            }
            
            ?>
            
            
            
            
        </select>
        
        
    </div>
    
    <div class="form-group">
        
        
        
        <label for="title">Post user</label>
        <select name="post_user" >
            
            <?php
            
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_users))
            {
                
                $user_id = $row['user_id'];
                $user_name = $row['username'];
                
                echo "<option value='{$user_name}'>{$user_name}</option>";
            }
            
            ?>
        
        
        </select>
        
        <!--
    <label for="title">Post author</label>
        <input type="text" name="post_author" class="form-control" />
    </div>
-->
    
    <div class="form-group">
    <label for="status">Post status</label>
        <select name="post_status">
        <option value="draft">Select status</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>
    
    <div class="form-group">
    <label for="title">Post image</label>
        <input type="file" name="post_image" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="tags">Post tags</label>
        <input type="input" name="post_tags" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="tags">Post content</label>
        <textarea name="post_content" class="form-control" cols=30; rows="10" ></textarea>
    </div>
    
    
    <div class="form-group">
        <input type="submit" name="create_post" value="Publish post"  class="btn btn-primary form-control" />
    </div>
    

</form>