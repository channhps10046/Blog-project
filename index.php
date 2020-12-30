<?php ob_start(); ?>
<?php include "./includes/header.php" ?>
<?php session_start(); ?>

<?php include "./includes/navigation.php" ?>


<div class="container">
    <div class="top-blog">

        <?php
        $query = "SELECT * FROM posts where post_views_count > 10 LIMIT 2";
        $select_top_post = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_top_post)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_comment_count = $row['post_comment_count'];
            $post_category_id = $row['post_category_id'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
        ?>
            <div class="top-blog__box">
                <a href="post.php?p_id=<?php echo $post_id ?>" style="text-decoration: none; color: white;">
                    <div class="group-image">
                        <img src="./images/<?php echo $post_image; ?>" alt="">
                        <div class="footer">
                            <?php
                            $query = "SELECT * FROM category where cat_id = $post_category_id";
                            $select_cat = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_cat)) {
                                $cat_title = $row['cat_title'];
                            ?>
                                <p class="footer__cat"><?php echo $cat_title; ?></p>
                            <?php
                            }
                            ?>
                            <h1 class="footer__title">
                                <a href="#"><?php echo $post_title; ?></a>
                            </h1>
                            <p class="footer__date"><?php echo $post_date; ?> | comments: <?php echo $post_comment_count; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
        <!-- 
        <div class="top-blog__box">
            <div class="group-image">
                <img src="./images/raychan-1213972-unsplash.jpg" alt="">
                <div class="footer">
                    <p class="footer__cat">Fashion</p>
                    <h1 class="footer__title">
                        <a href="#">Angelina Jolie’s Secret Style Weapon? The Top-Handle Tote</a>
                    </h1>
                    <p class="footer__date">May 23, 2019 | comments: 1</p>
                </div>
            </div>
        </div> -->
    </div>
</div>

<div class="main-box">
    <div class="container">
        <div class="home-page">
            <h1>Latest Posts</h1>
            <div class="row">
                <?php

                $per_page = 4;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }
                $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / $per_page);



                $query = "SELECT * FROM posts where post_status = 'published' LIMIT $page_1, $per_page";
                $select_all_post = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_post)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_views_count = $row['post_views_count'];


                ?>
                    <div class="col-2">
                        <a href="post.php?p_id=<?php echo $post_id ?>">
                            <div class="img-group">
                                <img src="./images/<?php echo $post_image ?>" alt="">
                            </div>
                            <p class="persionnal"><?php echo $post_author ?> - <?php echo $post_date ?><i class="fa fa-comment" aria-hidden="true"></i> <?php echo $post_comment_count ?></p>
                            <h2 class="title"><?php echo $post_title; ?></h2>
                        </a>
                    </div>

                <?php } ?>

            </div>


            <ul class="pager">
                <?php
                for ($i = 0; $i <= $count; $i++) {
                    if ($i == $page) {
                        echo "<li><a class='active_link' href='index.php?page={$i}'>$i</a></li>";
                    } else {
                        echo "<li><a href='index.php?page={$i}'>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <?php include "./includes/sidebar.php" ?>
</div>

<?php include "./includes/footer.php" ?>