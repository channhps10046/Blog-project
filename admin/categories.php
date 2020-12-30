<?php include "includes/admin-header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];

    if ($cat_title == "" && empty($cat_title)) {
        echo "This field should not by empty";
    } else {
        $query = "INSERT INTO category(cat_title) VALUE ('{$cat_title}')";
        $create_category_id = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

if (isset($_GET['delete'])) {
    $the_cat_id = $_GET['delete'];

    $query = "DELETE from category where cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    header('Location: categories.php');
}
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/admin-navigation.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php include "includes/admin-topbar.php" ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <div class="row">
                    <div class="col-6">
                        <form method="POST">
                            <div class="form-group">
                                <label for="category">category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                        </form>

                        <?php
                        if (isset($_GET['edit'])) {
                            include "includes/update_categories.php";
                        }
                        ?>


                    </div>
                    <div class="col-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>Category Title</td>
                                    <td>Delete</td>
                                    <td>Edit</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM category";
                                $select_category = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_category)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo " <tr>
                                                <td>$cat_id</td>
                                                <td>$cat_title</td>
                                                <td><a href='categories.php?delete=$cat_id'>Delete</a></td>
                                                <td><a href='categories.php?edit=$cat_id'>Edit</a></td>
                                           </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>