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



?>