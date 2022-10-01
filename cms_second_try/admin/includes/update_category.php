<form action="" method="post">
    <div class="form-group">
        <?php 
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                
                $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                $edit_category_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($edit_category_query)) {
                    $cat_title = $row['cat_title'];
                }
            }
                
        ?>
        
        <input type="text" value="<?php echo $cat_title; ?>" name="category_name" class="form-control" placeholder="Category Name">

    </div>
    <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
</form>