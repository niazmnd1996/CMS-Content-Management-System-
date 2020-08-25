
<?php




function users_online()
{
    
    global $connection;
    
$session = session_id();
$time = time();
$timeout = $time - 30 ;

$query = "SELECT * FROM users_online WHERE session='$session' ";
$count = mysqli_num_rows(mysqli_query($connection,$query));



if($count==null){
 
    mysqli_query($connection,"INSERT INTO users_online (session,time) VALUES ('$session','$time')");
}else{
    mysqli_query($connection,"UPDATE users_online SET time='{$time}' WHERE session='{$session}' ");
}

$query = "SELECT * FROM users_online WHERE time > $timeout";
$count = mysqli_num_rows(mysqli_query($connection,$query));

    return $count;
    
}





function confirmQuery($result)
{
    global $connection;
    if(!$result){
            die("Query failed : ".mysqli_error($connection));
        }
}















function insert_categories()
{
    global $connection;
    if(isset($_POST['submit']))
                            {
                                $cat_title = $_POST['cat_title'];
                                if($cat_title=="" || empty($cat_title))
                                {
                                    echo "This field should not be empty";
                                }else{
                                    $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
                                    if(!mysqli_query($connection,$query))
                                    {
                                        die("Error : ".mysqli_error($connection));
                                    }else{
                                        echo "<script> alert('Added successfully') </script>";
                                    }
                                }
                            }
}












function findAllCategories()
{
        global $connection;
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_all_categories))
        {
            $cat_id=$row['cat_id'];
            $cat_title = $row['cat_title'];


        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
        echo "<td><a href='categories.php?update=$cat_id'>Update</a></td>";
        echo "</tr>";  }   
}














function deleteCategories()
{
    
    global $connection;
    if(isset($_GET['delete']))
                                    {
                                        $the_cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                        mysqli_query($connection,$query);
                                        header("Location:categories.php");
                                    }
}






















?>