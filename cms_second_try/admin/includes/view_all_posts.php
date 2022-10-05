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
            echo "<td><img src='../images/$post_image'></td>";
            echo "<td>$post_content</td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_status</td>";
            echo "<td><a href='posts.php?source=update_post&update_post_id=$post_id'>Edit</a></td>";
            echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
            echo '</tr>';
        }

        if(isset($_GET['delete'])) {
            $post_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id='$post_id'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
    ?>
</table>