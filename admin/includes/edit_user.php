


<?php

if(isset($_GET['edit_user_id']))
{
    $the_user_id=$_GET['edit_user_id'];
    $query = "SELECT * FROM users WHERE user_id={$the_user_id}";
            $select_user = mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_user))
            {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_password = $row['user_password'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            


            }


       




if(isset($_POST['edit_user']))
{
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_password = $_POST['user_password'];
        /*
        $post_image=$_FILES['post_image']['name'];
        $post_image_temp=$_FILES['post_image']['tmp_name'];
        */
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
    
    
        
    
        if(!empty($user_password))
        {
            $query = "SELECT user_password FROM users WHERE user_id = {$the_user_id} ";
            $select_password = mysqli_query($connection,$query);
            $row = mysqli_fetch_assoc($select_password);
            $db_password = $row['user_password'];
            
            if($db_password!=$user_password)
            {
                $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));
            }
            
        }
        
    
    /*
    if(empty($post_image))
    {
        $select_img = "SELECT * FROM posts WHERE post_id='$the_post_id'";
        $select_image_query = mysqli_query($connection,$select_img);
        while($row=mysqli_fetch_assoc($select_image_query))
        {
            $post_image=$row['post_image'];
        }
    }
    */
    
    
    
    //move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query = "UPDATE users SET ";
    $query.=" username='$username' , ";
    $query.=" user_firstname='$user_firstname' , ";
    $query.=" user_lastname='$user_lastname' , ";
    $query.=" user_password='$user_password' , ";
    $query.=" user_email='$user_email' , ";
    $query.=" user_role='$user_role' ";
    $query.=" WHERE user_id=$the_user_id ";
    
    $update_user_query = mysqli_query($connection,$query); 
    
    confirmQuery($update_user_query);
    
    header("Location:users.php");
    
    
    
}


}else{
    header("Location:index.php");
}


?>



<form action="" method="post" enctype="multipart/form-data" >

  

    <div class="form-group">
    <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="user_firstname">User firstname</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control" />
    </div>
    
    
    <!--
    <div class="form-group">
    <label for="title">Post image</label>
        <input type="file" name="post_image" class="form-control" />
    </div>
-->
    
    <div class="form-group">
    <label for="user_lastname">User lastname</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control" />
    </div>
    
     <div class="form-group">
    <label for="category">User role</label>
        
        
        <select name="user_role" id="" >
            
            <option name="user_role" value="<?php echo $user_role ?>" ><?php echo $user_role; ?></option>
            <?php
            
            if($user_role=='admin')
            {
                 echo '<option name="user_role" value="subscriber" >Subscriber</option>';
            }else{
               echo '<option name="user_role" value="admin" >Admin</option>';
            }
            ?>
            
            
            
        </select>
        
        
    </div>
    
    <div class="form-group">
    <label for="user_email">User email</label>
        <input type="email" value="<?php echo $user_email; ?>" name="user_email" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="user_password">User_password</label>
        <input type="password" value="<?php echo $user_password; ?>" name="user_password" class="form-control" />
    </div>
    
    
    <div class="form-group">
        <input type="submit" name="edit_user" value="Update user"  class="btn btn-primary form-control" />
    </div>
    

</form>