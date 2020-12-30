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
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts where post_status = 'published' AND post_title LIKE '%$search%'";
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

                <?php }
                } ?>

            </div>


            <ul class="pager">
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
            </ul>
        </div>
    </div>

    <?php include "./includes/sidebar.php" ?>
</div>

<?php include "./includes/footer.php" ?>