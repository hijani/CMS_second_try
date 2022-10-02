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
                            Posts
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];

                                switch($source) {
                                    case 0: 
                                        echo 123;
                                        break;
                                    case 23: 
                                        echo 1200;
                                        break;
                                    default:
                                    include "includes/view_all_posts.php";
                                    break;
                                }
                            }
                            // include "includes/view_all_posts.php";
                        ?>
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
