<div class="well">
    <h4>Blog Search</h4>

    <?php 
        if(isset($_POST['post_search'])) {
            $search_text = $_POST['post_search_text'];

            $query = "SELECT * FROM posts WHERE post_tags = '$search_text'";
            $post_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($post_query)) {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];

    ?>
            <h2>
                <a href="#"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="<?php echo $post_image; ?>" alt="some images">
            <hr>
            <p><?php echo $post_content; ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
    <?php }} ?>
    
    <form action="" method="post">
        <div class="input-group">
            <input name="post_search_text" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="post_search" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>