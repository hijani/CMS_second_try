<table class="table">
    <tr>
        <th>ID</th>
        <th>Comment Author</th>
        <th>Comment Email</th>
        <th>Comment Content</th>
        <th>Comment Date</th>
        <th>In Response to</th>
        <th>Approve</th>
        <th>Un-Approve</th>
        <!-- <th>Edit</th> -->
        <th>Delete</th>
    </tr>
    <?php 
        $query = "SELECT * FROM comments";
        $comment_query = mysqli_query($connection, $query);

        if(!$comment_query) {
            die("query failed" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($comment_query)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];
            $comment_status = $row['comment_status'];


            echo '<tr>';
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_status</td>";

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $post_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($post_query)) {
                $post_title = $row['post_title'];
            }
            echo "<td><a href='../post.php?p_id=$comment_post_id'>$post_title</a></td>";

            echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id'>Un-Approve</a></td>";
            echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
            echo '</tr>';
        }

        if(isset($_GET['delete'])) {
            $comment_id = $_GET['delete'];
            $query = "DELETE FROM comments WHERE comment_id='$comment_id'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: comments.php");

            $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
            $query .= "WHERE post_id = $comment_post_id";
            $decrease_comment_count = mysqli_query($connection, $query);
        }

        if(isset($_GET['approve'])) {
            $comment_id = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'Approved' ";
            $query .= "WHERE comment_id = $comment_id ";
            $approved = mysqli_query($connection, $query);
            header("Location: comments.php");
        }

        if(isset($_GET['unapprove'])) {
            $comment_id = $_GET['unapprove'];
            $query = "UPDATE comments SET comment_status = 'Un-Approved' ";
            $query .= "WHERE comment_id = $comment_id ";
            $approved = mysqli_query($connection, $query);
            header("Location: comments.php");
        }
    ?>
</table>