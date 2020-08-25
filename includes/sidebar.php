<div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                        </form>
                    <!-- /.input-group -->
                </div>
    
    
    <div class="well">
    
    <form action="includes/login.php" method="post" >
                        
                        <div class="form-group" >
                        
                        <input type="text" name="username" placeholder="Enter username" class="form-control" />
                        
                        </div>
        
        <div class="input-group">
        <input type="password" name="password" placeholder="Enter password" class="form-control" />
            
            <span class="input-group-btn">
            <button type="submit" name="login" class="btn btn-primary" >Login</button>
            </span>
        </div>
                    
                    </form>
        </div>
    
    
    
    

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                
                                
                                <?php
                                
                                
                                $query = "SELECT * FROM categories";
                                $select_all_categories = mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_all_categories))
                                {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    ?>
                                <li><a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                                </li>
                                <?php
                                }
                                
                                
                                
                                ?>
                                
                                
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php"?>

            </div>