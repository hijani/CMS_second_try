<table class="table">
    <tr>
        <th>Comment Author</th>
        <th>Comment Email</th>
        <th>Comment Content</th>
        <th>Comment Date</th>
        <th>Approve</th>
        <th>Un-Approve</th>
        <th>Edit</th>
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
            echo "<td>$comment_author</td>";
            echo "<td>$comment_email</td>";
            echo "<td>$comment_content</td>";
            echo "<td>$comment_date</td>";
            echo "<td>dispprove</td>";
            echo "<td>approve</td>";
            echo "<td><a href='Comments.php?source=update_Comment&update_Comment_id=$comment_id'>Edit</a></td>";
            echo "<td><a href='Comments.php?delete=$comment_id'>Delete</a></td>";
            echo '</tr>';
        }

        if(isset($_GET['delete'])) {
            $comment_id = $_GET['delete'];
            $query = "DELETE FROM Comments WHERE Comment_id='$comment_id'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: comments.php");
        }
    ?>
</table>