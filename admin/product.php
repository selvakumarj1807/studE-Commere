<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Kavin Online Market";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
    exit();
}

?>
<?php include('header.php') ?>

<style>
    .anyClass {
        height: 350px;
        overflow-y: scroll;
    }
</style>

<body>

    <?php

    $category = $_GET["category"];
    echo $category;

    ?>
    <div class="content-wrapper">
        <div class="container">
            <br>
            <section class="content-header">
                <h1>
                    All products
                </h1>
            </section>
            <br>
            <br />
            <div class="form-group float-right">
                <a href="product_add.php?category=<?php echo $category; ?>"><button class="btn btn-success">Add Product</button></a>
            </div>

            <div id="action-page-nav" class="anyClass">

                <div id="table-content">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light ">
                            <tr>
                                <th>Id</th>
                                <th>Category</th>
                                <th>Product Id</th>
                                <th>Name</th>
                                <th>Image </th>
                                <th>Rate 1</th>
                                <th>Rate 2</th>
                                <th>Type</th>
                                <th>In Stock</th>
                                <th>Sold Quantity</th>
                                <th>Description</th>
                                <th>Display</th>
                                <th>Offer</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $slno = 0;
                            $result = mysqli_query($conn, "SELECT * FROM `products` where `category`='$category' ");

                            while ($row_result = mysqli_fetch_array($result)) {
                                $slno++;
                                $item_id = $row_result['id'];
                                $category = $row_result['category'];

                                $item_id1 = $row_result['item_id'];
                                $name = $row_result['name'];
                                $image = $row_result['image'];

                                $rate1 = $row_result['rate1'];
                                $rate2 = $row_result['rate2'];
                                $offer = $row_result['offer'];
                                $type = $row_result['type'];
                                $instock = $row_result['instock'];
                                $saleqty = $row_result['saleqty'];
                                $description = $row_result['description'];
                                $display = $row_result['display'];
                            ?>
                                <tr>
                                    <td><?php echo $slno; ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td><?php echo $item_id1; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><img class="img-responsive" width="100" height="100" src="  Upload/<?php echo $image; ?>" /></td>
                                    <td><?php echo $rate1; ?></td>
                                    <td><?php echo $rate2; ?></td>
                                    <td><?php echo $type; ?></td>
                                    <td><?php echo $instock; ?></td>
                                    <td><?php echo $saleqty; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><?php echo $display; ?></td>
                                    <td><?php echo $offer; ?></td>
                                    <td class="text-center">
                                        <a href="product_edit.php?id=<?php echo $row_result['id']; ?>">product Edit<i class="fa fa-edit" style="color:red"></i></a> &nbsp;&nbsp;&nbsp;
                                        <a href="product_remove.php?id=<?php echo $row_result['id']; ?>&category=<?php echo $row_result['category']; ?>">Product Remove<i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <table>
                </div>
            </div>

        </div>
    </div>

    <!-- Main row -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet" />

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
</body>

</html>