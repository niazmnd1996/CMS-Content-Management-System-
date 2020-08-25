<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


<?php


if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    
    
    $username = mysqli_real_escape_string($connection,$username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection,$password);
    
    
    
    
    if(!empty($username) && !empty($email) && !empty($password))
    {
        
        $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));
        
        $query = "INSERT INTO users (username,user_email,user_password,user_role) VALUES('{$username}','{$email}','{$password}','subscriber')";
        $insert_user = mysqli_query($connection,$query);
        if($insert_user)
        {
            $message = "User inserted";
        }else{
            $message = "User not inserted";
        }
    }else{
        $message = "Feilds should not be empty!";
    }
    
    
    
}else{
    $message = "";
}


?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        
                        <h6 class="text-center"><?php echo $message; ?></h6>
                        
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>