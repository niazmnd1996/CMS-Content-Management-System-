 


<form action="" method="post" enctype="multipart/form-data" >

    
    
    
    
    <?php
    
    if(isset($_POST['create_user']))
    {
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        
        /*
        $post_image=$_FILES['post_image']['name'];
        $post_image_temp=$_FILES['post_image']['tmp_name'];
        */
        
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        
        $user_password = password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));
        
        
       // move_uploaded_file($post_image_temp,"../images/$post_image");
        
        
        $query = "INSERT INTO users (username,user_firstname,user_lastname,user_role,user_email,user_password) ";
        $query.=" VALUES ('$username','$user_firstname','$user_lastname','$user_role', '$user_email' , '$user_password')";
        
        $insert_user = mysqli_query($connection,$query);
        
        confirmQuery($insert_user);
        
        if($insert_user)
        {
            echo "User created "."<a href='users.php'>View All users</a>"
;        }
        
        
        
    }
    
    ?>
    
    
   
    
   
    
    <div class="form-group">
    <label for="username">Username</label>
        <input type="text" name="username" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="user_firstname">User firstname</label>
        <input type="text" name="user_firstname" class="form-control" />
    </div>
    
    
    <!--
    <div class="form-group">
    <label for="title">Post image</label>
        <input type="file" name="post_image" class="form-control" />
    </div>
-->
    
    <div class="form-group">
    <label for="user_lastname">User lastname</label>
        <input type="text" name="user_lastname" class="form-control" />
    </div>
    
     <div class="form-group">
    <label for="category">User role</label>
        
        
        <select name="user_role" id="" >
            
            <option name="user_role" value="subscriber" >Select option</option>
            
            <option name="user_role" value="subscriber" >Subscriber</option>
            <option name="user_role" value="admin" >Admin</option>
            
            
        </select>
        
        
    </div>
    
    <div class="form-group">
    <label for="user_email">User email</label>
        <input type="email" name="user_email" class="form-control" />
    </div>
    
    <div class="form-group">
    <label for="user_password">User_password</label>
        <input type="password" name="user_password" class="form-control" />
    </div>
    
    
    <div class="form-group">
        <input type="submit" name="create_user" value="Add user"  class="btn btn-primary form-control" />
    </div>
    
    
    

</form>