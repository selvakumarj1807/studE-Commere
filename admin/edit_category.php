<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Ecom";
$id = $_REQUEST["id"];

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
    exit();
}

?>
<?php include('header.php') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Category
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box-body">
            <form role="form" action="update_cateegory.php" method="POST" enctype="multipart/form-data">

                <?php
                $result = mysqli_query($conn, "SELECT * FROM `category` where id = '$id' ");
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $category = $row['category'];

                    $image = $row['image'];
                }  ?>

                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                <div class="col-md-4">


                    <div class="form-group">
                        <label for="ban">Category</label>
                        <input class="form-control" type="text" name="category" value="<?php echo $category; ?>" />
                    </div>

                    <img class="img-responsive" width="70" height="85" src="Upload/<?php echo $image; ?>" alt="no image" />

                    <div class="col-md-4">
                        <div class="input-wrap">
                            <label for="save">Image </label>
                            <input type="file" name="image" accept="image/jpeg" value="<?php echo $image; ?>">
                            <input class="file-path validate" type="hidden" placeholder="Choose your profile image">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="addCategory.php"><button type="button" class="btn btn-primary">Back</button></a>

                </div>
            </form>
        </div>

    </section>
</div>


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