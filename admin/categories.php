<
<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        
        
        
        
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Auhtor's name</small>
                        </h1>
                        
                        
                        
                        
                        
                        
                        <div class="col-xs-6">
                            
                            <?php    insert_categories();     ?>
                        
                            <form action="" method="post">
                            
                                <div class="form-group">
                                    <label for="catTitle">Category title</label>
                                    <input type="text" class="form-control" name="cat_title"/>
                                </div>
                                
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add category" />
                                </div>
                            
                            </form>
                        
                            
                            <!-- update query --->
                                   <?php include "includes/edit_category.php"; ?>
                            
                            <!-- end of update query --->
                            
                        </div>
                        
                        
                        <div class="col-xs-6">
                        
                            <table class="table table-bordered table-hover ">
                                <thead>
                                <tr>
                                    <th>Category id</th>
                                    <th>Category title</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                    findAllCategories();
                                    ?>
                                    
                                    
                                    
                                    <!-- Delete category query -->
                                    <?php
                                    deleteCategories();
                                    ?>
                                    <!-- end of Delete category query -->
                                    
                                    
                                    
                                    
                                    
                                
                                </tbody>
                            </table>
                            
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

     <?php include "includes/admin_footer.php"; ?>