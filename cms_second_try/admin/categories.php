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
                        <form action="">
                            <div class="form-group">
                                <input type="text" name="category_name" class="form-control" placeholder="Category Name">
                            </div>
                            <button class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            
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
