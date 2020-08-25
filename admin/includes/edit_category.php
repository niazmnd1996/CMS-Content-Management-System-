 <?php
                                    if(isset($_GET['update']))
                                    { 
                                    $update_cat_id = $_GET['update'];
                                    $query = "SELECT * FROM categories WHERE cat_id='$update_cat_id'";
                                    if(!$select_update_categories = mysqli_query($connection,$query))
                                    {
                                        die("Error : ".mysqli_error($connection));
                                    }
                                    while($row=mysqli_fetch_assoc($select_update_categories))
                                    {
                                        $update_cat_title = $row['cat_title'];
                                    ?>
                                    
                            
                            
                             <form action="" method="post">
                            
                                <div class="form-group">
                                    <label for="catTitle">Category title</label>
                                    <input type="text" value="<?php echo $update_cat_title; ?>" class="form-control" name="cat_title"/>
                                </div>
                                
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update" value="Update category" />
                                </div>
                            
                            </form>
                            
                            <?php
                                    }
                                        }
                                    ?>
                            
                            
                            
                            <?php
                            if(isset($_POST['update']))
                            {
                                $the_update_title = $_POST['cat_title'];
                                $query = "UPDATE categories set cat_title='$the_update_title' WHERE cat_id='$update_cat_id'";
                                if(!mysqli_query($connection,$query)){
                                    die("Failed : ".mysqli_error($connection));
                                }
                            }
                            ?>