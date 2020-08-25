


<?php

if(isset($_GET['p_id']))
{
    $the_post_id=$_GET['p_id'];
    $query = "SELECT * FROM posts WHERE post_id={$the_post_id}";
            $select_all_posts = mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_all_posts))
            {
            $post_id = $row['post_id'];
            $post_cat_id = $row['post_cat_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_user'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];


            }
}

       




if(isset($_POST['update_post']))
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
    
    
    if(empty($post_image))
    {
        $select_img = "SELECT * FROM posts WHERE post_id='$the_post_id'";
        $select_image_query = mysqli_query($connection,$select_img);
        while($row=mysqli_fetch_assoc($select_image_query))
        {
            $post_image=$row['post_image'];
        }
    }
    
    
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query = "UPDATE posts SET ";
    $query.=" post_title='$post_title' , ";
    $query.=" post_cat_id='$post_cat_id' , ";
    $query.=" post_user='$post_user' , ";
    $query.=" post_status='$post_status' , ";
    $query.=" post_image='$post_image' , ";
    $query.=" post_tags='$post_tags' , ";
    $query.=" post_date='$date' , ";
    $query.=" post_comment_count='$post_comment_count' ";
    $query.=" WHERE post_id='$the_post_id' ";
    
    $update_post_query = mysqli_query($connection,$query); 
    
    confirmQuery($update_post_query);
    
    if($update_post_query)
    {
        echo "<p style='padding:10px;' class='bg-success'>Post updated. <a href='../post.php?p_id={$the_post_id}'>View post<a/> or <a href='posts.php'>Edit more posts</a></p>";
    }
    
    
    
}





?>



<form action="" method="post" enctype="multipart/form-data" >

  

    <div class="form-group">
        
    <label for="title">Post title</label>
        <input type="text" value="<?php echo $post_title?>" name="post_title" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="category">Post category</label>
        <select name="post_cat_id">
            <?php
            
            $query = "SELECT * FROM categories";
               $select_categories = mysqli_query($connection,$query);
               confirmQuery($select_categories);
               while($row=mysqli_fetch_assoc($select_categories))
               {
                   $cat_id=$row['cat_id'];
                   $cat_title = $row['cat_title'];
               
            
            
            ?>
        <option value="<?php echo $cat_id; ?>"><?php echo $cat_title;  ?></option>
            
            <?php } ?>
         
        </select>
    </div>
    
    
    
    <div class="form-group">
    <label for="title">Post user</label>
        <select name="post_user" >
            <option value="<?php echo $post_user; ?>"><?php echo $post_user; ?></option>
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
        
    </div>
    
    <!--
    <div class="form-group">
    <label for="title">Post author</label>
        <input type="text" value="<?php echo $post_author?>" name="post_author" class="form-control" />
    </div>
    -->
    
    
    <div class="form-group" >
        <select name="post_status" >
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            <?php
            if($post_status=='published')
            {
                echo "<option value='draft' >Draft</option>";
            }else{
                echo "<option value='published' >Published</option>";
            }
                ?>
        </select>
    
    </div>
    
    
    <!--
    <div class="form-group">
    <label for="status">Post status</label>
        <input type="text" value="<?php echo $post_status?>" name="post_status" class="form-control" />
    </div>
    -->
    
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>">
    <label for="title">Post image</label>
        <input type="file"  name="post_image" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="tags">Post tags</label>
        <input type="input" value="<?php echo $post_tags?>" name="post_tags" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="tags">Post content</label>
        <textarea name="post_content"  class="form-control" cols=30; rows="10" ><?php echo $post_content?></textarea>
    </div>
    
    
    <div class="form-group">
        <input type="submit" name="update_post" value="Update post"  class="btn btn-primary form-control" />
    </div>
    

</form>