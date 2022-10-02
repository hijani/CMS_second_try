<?php 

    if(isset($_POST['add_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_image = $_POST['name']['post_image'];
        $post_image_temp = $_POST['tmp']['post_image'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_status = $_POST['post_status'];

        $query = "INSERT INTO posts (post_title, ";
        $query .= "post";
        

    }

?>


<form action="" method="post">
    <div class="form-group">
        <input type="text" name="post_title" class="form-control" placeholder="Post Title">
    </div>
    <div class="form-group">
        <input type="text" name="post_category_id" class="form-control" placeholder="Post Category ID">
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