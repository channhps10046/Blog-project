<?php include "./includes/header.php" ?>


<?php include "./includes/navigation.php" ?>


<div class="container">
    <div class="top-blog">

        <div class="top-blog__box">
            <div class="group-image">
                <img src="./images/valerie-elash-1252873-unsplash.jpg" alt="">
                <div class="footer">
                    <p class="footer__cat">Fashion</p>
                    <h1 class="footer__title">
                        <a href="#">Angelina Jolie’s Secret Style Weapon? The Top-Handle Tote</a>
                    </h1>
                    <p class="footer__date">May 23, 2019 | comments: 1</p>
                </div>
            </div>
        </div>

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
        </div>
    </div>
</div>

<div class="main-box">
    <div class="container">
        <div class="home-page">
            <h1>Latest Posts</h1>
            <div class="row">
                <?php
                if (isset($_GET['category'])) {
                    $post_category_id = $_GET['category'];
                }
                $query = "SELECT * FROM posts where post_category_id = $post_category_id";
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