<?php ob_start(); ?>
<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                        </h1>
                    </div>
                    <div class="col-md-4">
                        <?php 
                        
                            if(isset($_POST['add_category'])) {
                                $category_content = $_POST['category_name'];
                                
                                $query = "INSERT INTO categories (cat_title) ";
                                $query .= "VALUES ('$category_content') ";
                                $add_category_query = mysqli_query($connection, $query);
                            }
                        
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                            </div>
                            <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                        </form>

                        <hr>

                        <?php 
                        
                            if(isset($_POST['update_category'])) {
                                $cat_id = $_GET['edit'];
                                $category_content = $_POST['category_name'];
                                
                                $query = "UPDATE categories SET cat_title = '$category_content' ";
                                $query .= "WHERE cat_id = $cat_id ";
                                $update_category_query = mysqli_query($connection, $query);
                            }
                        
                        ?>

                        <?php 
                            if(isset($_GET['edit'])) {
                                include "includes/update_category.php";
                            }
                        ?>

                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>Category ID</th>
                                <th>Category Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                                <?php 
                                
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

                                    if(isset($_GET['delete'])) {
                                        $cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE cat_id='$cat_id'";
                                        $delete_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                    }
                                
                                ?>
                        </table>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
    <!-- /.container-fluid -->

</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
