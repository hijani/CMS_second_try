<?php 

    if(isset($_POST['add_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_status = $_POST['post_status'];
        // $post_comment_count = 4;

        $query = "INSERT INTO posts (post_title, ";
        $query .= "post_category_id, post_author, ";
        $query .= "post_date, post_image, post_content, ";
        $query.= "post_tags, post_status) ";

        $query.= " VALUES ('$post_title', $post_category_id, ";
        $query.= "'$post_author', now(), '$post_image', ";
        $query.= "'$post_content', '$post_tags', '$post_status') ";
        $add_post_query = mysqli_query($connection, $query);

        move_uploaded_file($post_image_temp, "../images/$post_image");

    }

?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" name="post_title" class="form-control" placeholder="Post Title">
    </div>
    <div class="form-group">
        <select name="post_category_id" id="post_category_id">
        <?php 
                
            $query = "SELECT * FROM categories";
            $edit_category_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($edit_category_query)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value=$cat_id>$cat_title</option>";
            }
                
        ?>
            
        </select>
    </div>
    <div class="form-group">
        <input type="text" name="post_author" class="form-control" placeholder="Post Author">
    </div>
    <div class="form-group">
        <input type="file" name="post_image" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="post_content" cols="30" rows="10" placeholder="Post Content"></textarea>
    </div>
    <div class="form-group">
        <input type="text" name="post_tags" class="form-control" placeholder="Post Tags">
    </div>
    <div class="form-group">
        <input type="text" name="post_status" class="form-control" placeholder="Post Status">
    </div>
    <input type="submit" value="Add Post" name="add_post" class="btn btn-primary">
    
</form>