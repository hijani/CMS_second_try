<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php 
                    
                    $query = "SELECT * FROM categories";
                    $categories_connection = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($categories_connection)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href='index.php?category_id=$cat_id'>$cat_title</a></li>";
                        
                    }
                
                ?>
                
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>