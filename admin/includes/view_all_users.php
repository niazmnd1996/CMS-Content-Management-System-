<div class="table-responsive">
<table class="table table-bordered table-hover"  >

                <thead>
                <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                    
                    
                <tbody>
                    
                    
                    
                    <?php
                    
                    
                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_users))
                    {
                        $user_id = $row['user_id'];
                        $username= $row['username'];
                        $user_password = $row['user_password'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname= $row['user_lastname'];
                        $user_email= $row['user_email'];
                        $user_image= $row['user_image'];
                        $user_role= $row['user_role'];
                        
                        
                        
                        echo "<tr>";
                        echo "<td>{$user_id}</td>";
                        echo "<td>{$username}</td>";
                        echo "<td>{$user_password}</td>";
                        
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
                        
                        
                        
                        echo "<td>{$user_firstname}</td>";
                        echo "<td>{$user_lastname}</td>";
                        
                        /*
                        $query = "SELECT * FROM posts WHERE post_id =$comment_post_id ";
                        $select_post_title = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($select_post_title))
                        {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            
                            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                        }
                        */
                        
                        
                        
                        
                        
                        
                        echo "<td>{$user_email}</td>";
                        echo "<td>{$user_role}</td>";
                        
                        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</td>";
                        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</td>";
                        echo "<td><a href='users.php?delete={$user_id}'>Delete</td>";
                        echo "<td><a href='users.php?source=edit_user&edit_user_id={$user_id}'>Edit user</td>";
                        echo "</tr>";

                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    ?>
                    
                    
                    
                
                </tbody>



                </table>
    
    </div>


<?php






if(isset($_GET['change_to_admin']))
        {
            $change_user_id = $_GET['change_to_admin'];
            
            $query = "UPDATE users SET user_role='admin' WHERE user_id={$change_user_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:users.php");
            
        }






if(isset($_GET['change_to_sub']))
        {
            $change_user_id = $_GET['change_to_sub'];
            
            $query = "UPDATE users SET user_role='subscriber' WHERE user_id={$change_user_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:users.php");
            
        }





        if(isset($_GET['delete']))
        {
            $delete_user_id = $_GET['delete'];
            
            $query = "DELETE FROM users WHERE user_id={$delete_user_id}";
            $result = mysqli_query($connection,$query);
            confirmQuery($result);
            
            header("Location:users.php");
            
        }


?>

                        