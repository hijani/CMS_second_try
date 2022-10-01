<?php 

    function add_category() {
        global $connection;
                        
        if(isset($_POST['add_category'])) {
            $category_content = $_POST['category_name'];
            
            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUES ('$category_content') ";
            $add_category_query = mysqli_query($connection, $query);
        }
    }
    function delete_category() {
        global $connection;

        if
    }



?>