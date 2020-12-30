<?php include "includes/admin-header.php"; ?>

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
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Posts</div>
                                        <?php
                                        $query = "SELECT * FROM posts";
                                        $select_post = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($select_post);
                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$post_count</div>"
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Comments</div>
                                        <?php
                                        $query = "SELECT * FROM comments";
                                        $select_comment = mysqli_query($connection, $query);
                                        $comment_count = mysqli_num_rows($select_comment);
                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$comment_count</div>"
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Users</div>
                                        <?php
                                        $query = "SELECT * FROM users";
                                        $select_user = mysqli_query($connection, $query);
                                        $user_count = mysqli_num_rows($select_user);
                                        echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$user_count</div>"
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Category
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <?php
                                                $query = "SELECT * FROM category";
                                                $select_category = mysqli_query($connection, $query);
                                                $category_count = mysqli_num_rows($select_category);
                                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$category_count</div>"
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $query = "SELECT * FROM posts where post_status = 'draft'";
                    $select_all_draft_post = mysqli_query($connection, $query);
                    $draft_count = mysqli_num_rows($select_all_draft_post);

                    $query = "SELECT * FROM posts where post_status = 'published'";
                    $select_all_pub_post = mysqli_query($connection, $query);
                    $pub_count = mysqli_num_rows($select_all_pub_post);

                    $query = "SELECT * FROM comments where comment_status = 'unapprove'";
                    $select_all_unapprove = mysqli_query($connection, $query);
                    $unapprove_count = mysqli_num_rows($select_all_unapprove);

                    $query = "SELECT * FROM users where user_role = 'subscriber'";
                    $select_all_sub = mysqli_query($connection, $query);
                    $sub_count = mysqli_num_rows($select_all_unapprove);
                    ?>
                </div>






            </div>
            <!-- /.container-fluid -->

            <div class="row">
                <div class="col-12">
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],
                                <?php
                                $element_text = ['All Post', 'Active Posts', 'Draft Posts', 'Categories', 'Users', 'Subscribers', 'Comments', 'Pending Comment'];
                                $element_count = [$pub_count, $post_count, $draft_count, $category_count, $user_count, $sub_count, $comment_count, $select_all_unapprove];

                                for ($i = 0; $i < 6; $i++) {
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                                ?>
                                // ['Posts', 1000],
                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                </div>
            </div>

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include "includes/admin-footer.php"; ?>