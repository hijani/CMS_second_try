<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <?php 

                if(isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                }

                $query = "SELECT * FROM posts WHERE post_id = $post_id ";
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
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="some images">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
            <?php } ?>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>

                    <?php 
                        if(isset($_POST['add_comment'])) {
                            $comment_email = $_POST['comment_email'];
                            $comment_author = $_POST['comment_author'];
                            $comment_content = $_POST['comment_content'];

                            $query = "INSERT INTO comments (comment_post_id, comment_author, ";
                            $query .= "comment_email, comment_content, ";
                            $query .= "comment_date, comment_status) ";
                            $query .= "VALUES ($post_id, '$comment_author', ";
                            $query .= "'$comment_email', '$comment_content', ";
                            $query .= "now(), 'approved') ";
                            $add_comment_query = mysqli_query($connection, $query);

                        }
                    ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="comment_author">Name</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="text" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Your Message</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="submit" name="add_comment" class="btn btn-primary" value="Submit">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
                    $query .= "AND comment_status = 'Approved'";
                    $comment_query = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($comment_query)) {
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        $comment_date = $row['comment_date'];
                        $comment_status = $row['comment_status'];
                    
                ?>
                <div class="media">
                    <!-- <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="person-pic">
                    </a> -->
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <?php } ?>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <?php include "includes/blog_search.php"; ?>

                <!-- Blog Categories Well -->
                <?php include "includes/blog_categories.php"; ?>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
