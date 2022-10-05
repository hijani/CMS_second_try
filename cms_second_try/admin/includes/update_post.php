<?php 

    if(isset($_GET['update_post_id'])) {
        $update_post_id = $_GET['update_post_id'];
    }

    if(isset($_POST['update_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_status = $_POST['post_status'];
        $post_comment_count = 4;

        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $update_post_id";
            $image_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($image_query)) {
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET post_title = '$post_title', ";
        $query .= "post_category_id = $post_category_id, ";
        $query .= "post_author = '$post_author', ";
        $query .= "post_image = '$post_image', ";
        $query .= "post_content = '$post_content', ";
        $query .= "post_tags = '$post_tags', ";
        $query .= "post_status = '$post_status', ";
        $query .= "post_comment_count = $post_comment_count, ";
        $query .= "post_date = now() ";
        $query .= " WHERE post_id = $update_post_id ";
        $update_post_query = mysqli_query($connection, $query);

        

        move_uploaded_file($post_image_temp, "../images/$post_image");
    }   

        $show_query = "SELECT * FROM posts WHERE post_id = $update_post_id";
        $show_update_post = mysqli_query($connection, $show_query);

        while ($row = mysqli_fetch_assoc($show_update_post)) {
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
        }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control" placeholder="Post Title">
    </div>
    <div class="form-group">
        <select name="psot_category_id" id="">
        <?php 
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                
                $query = "SELECT * FROM categories";
                $edit_category_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($edit_category_query)) {
                    $cat_title = $row['cat_title'];
                    echo "<option value=$cat_id>$cat_title</option>";
                }
            }
                
        ?>
            
        </select>
    </div>
    <div class="form-group">
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control" placeholder="Post Author">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $post_image; ?>" width="100px" alt="some images">
        <input type="file" name="post_image" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="post_content" cols="30" rows="10" placeholder="Post Content"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control" placeholder="Post Tags">
    </div>
    <div class="form-group">
        <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control" placeholder="Post Status">
    </div>
    <input type="submit" value="Update Post" name="update_post" class="btn btn-primary">
    
</form>
<?php 

// if($post_image === '') {
//     $post_image = $post_image;           
// }

?>


