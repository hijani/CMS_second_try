<table class="table">
    <tr>
        
        <th>Post Author</th>
        <th>Post Date</th>
        <th>Post Content</th>
        <th>Post Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php 
        $query = "SELECT * FROM comments";
        $comment_query = mysqli_query($connection, $query);

        if(!$post_query) {
            die("query failed" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($comment_query)) {

            


            echo '<tr>';
            echo "<td>$post_title</td>";
            
            $query = "SELECT * FROM categories WHERE cat_id = $post_category";
            $edit_category_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($edit_category_query)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
            }

            echo "<td><a href='../categories.php?category_id=$cat_id'>$cat_title</a></td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_date</td>";
            echo "<td><img src='../images/$post_image' width='100px'></td>";
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