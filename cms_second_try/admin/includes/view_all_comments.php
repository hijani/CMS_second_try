<table class="table">
    <tr>
        <th>Comment Author</th>
        <th>Comment Email</th>
        <th>Comment Content</th>
        <th>Comment Date</th>
        <th>Comment Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
        $query = "SELECT * FROM comments";
        $comment_query = mysqli_query($connection, $query);

        if(!$Comment_query) {
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
            echo "<td>$Comment_author</td>";
            echo "<td>$Comment_email</td>";
            echo "<td>$Comment_content</td>";
            echo "<td>$Comment_date</td>";
            echo "<td>$Comment_status</td>";
            echo "<td><a href='Comments.php?source=update_Comment&update_Comment_id=$Comment_id'>Edit</a></td>";
            echo "<td><a href='Comments.php?delete=$Comment_id'>Delete</a></td>";
            echo '</tr>';
        }

        if(isset($_GET['delete'])) {
            $Comment_id = $_GET['delete'];
            $query = "DELETE FROM Comments WHERE Comment_id='$Comment_id'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: Comments.php");
        }
    ?>
</table>