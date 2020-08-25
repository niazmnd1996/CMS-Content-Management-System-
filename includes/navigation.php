<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    
                    <?php
                    
                    
                    
                    
                   
                    $cat_class = "";
                    
                    $registration_page_class = "";
                    $current_page =  basename($_SERVER['PHP_SELF']);
                    if($current_page=='registration.php')
                    {
                        $registration_page_class='active';
                    }
                    
                    
                    
                    
                    $query = "SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($select_all_categories))
                    {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        
                        
                            if(isset($_GET['category']) && $_GET['category']==$cat_id)
                            {
                            $cat_class = 'active';

                            }else{
                                $cat_class="";
                            }
                        
                        ?>
                    
                     
                    
                    
                    
                    <li class="<?php echo $cat_class; ?>" ><a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></li>
                            <?php
                    }
                    
                    
                    ?>
                    
                    
                    
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    
                   
                     
                    
                     <li class="<?php echo $registration_page_class; ?>">
                        <a href="registration.php">Registration</a>
                    </li>
                    
                    
                    <?php
                    
                    if(isset($_SESSION['role']))
                    {
                        
                        if(isset($_GET['p_id']))
                        {
                            $post_id=$_GET['p_id'];
                            echo "<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit post</a></li>";
                        }
                        
                    }
                    
                    ?>
                    
                    <!--
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>