<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <th>Post ID</th>
                                <th>Post Title</th>
                                <th>Post Author</th>
                                <th>Post Date</th>
                                <th>Post Image</th>
                                <th>Post Content</th>
                                <th>Post Tags</th>
                                <th>Post Comment Count</th>
                                <th>Post Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php 
                                $query = "SELECT * FROM posts";
                                $post_query = mysqli_query($connection, $query);

                                if(!$post_query) {
                                    die("query failed" . mysqli_error($connection));
                                }

                                while ($row = mysqli_fetch_assoc($post_query)) {

                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_content = $row['post_content'];
                                    $post_tags = $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    $post_status = $row['post_status'];


                                    echo '<tr>';
                                    echo "<td>$post_id</td>";
                                    echo "<td>$post_title</td>";
                                    echo "<td>$post_author</td>";
                                    echo "<td>$post_date</td>";
                                    echo "<td>$post_image</td>";
                                    echo "<td>$post_content</td>";
                                    echo "<td>$post_tags</td>";
                                    echo "<td>$post_comment_count</td>";
                                    echo "<td>$post_status</td>";
                                    echo "<td><a href=''>Edit</a></td>";
                                    echo "<td><a href=''>Delete</a></td>";
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
