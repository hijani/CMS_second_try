<?php ob_start(); ?>
<?php include "includes/db.php"; ?>

<?php include "includes/functions.php"; ?>

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
                        <?php add_category(); ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                            </div>
                            <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                        </form>

                        <hr>

                        <?php update_category(); ?>

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
                                
                                    show_category();

                                    delete_category();
                                
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
