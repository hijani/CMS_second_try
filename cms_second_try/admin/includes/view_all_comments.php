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
            

            


            echo '<tr>';
            echo "<td>$Comment_title</td>";
            
            $query = "SELECT * FROM categories WHERE cat_id = $post_category";
            $edit_category_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($edit_category_query)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
            }

            echo "<td><a href='../categories.php?category_id=$cat_id'>$cat_title</a></td>";
            echo "<td>$Comment_author</td>";
            echo "<td>$Comment_date</td>";
            echo "<td><img src='../images/$Comment_image' width='100px'></td>";
            echo "<td>$Comment_content</td>";
            echo "<td>$Comment_tags</td>";
            echo "<td>$Comment_comment_count</td>";
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