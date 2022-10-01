<?php 


    function update_category() {
        global $connection;

        if(isset($_POST['update_category'])) {
            $cat_id = $_GET['edit'];
            $category_content = $_POST['category_name'];
            
            $query = "UPDATE categories SET cat_title = '$category_content' ";
            $query .= "WHERE cat_id = $cat_id ";
            $update_category_query = mysqli_query($connection, $query);
        }
    }

    function add_category() {
        global $connection;
        
        if(isset($_POST['add_category'])) {
            $category_content = $_POST['category_name'];
            
            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUES ('$category_content') ";
            $add_category_query = mysqli_query($connection, $query);
        }
    }

    function show_category() {
        global $connection;

        $query = "SELECT * FROM categories";
        $category_query = mysqli_query($connection, $query);

        if(!$category_query) {
            die("Query Failed" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_assoc($category_query)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            echo "<td>$cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a href='categories.php?edit=$cat_id'>Edit</a></td>";
            echo "<td><a href='categories.php?delete=$cat_id'>Delete</a></td>";
            echo "</tr>";

        }
    }

    function delete_category() {
        global $connection;

        if(isset($_GET['delete'])) {
            $cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id='$cat_id'";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    }


?>