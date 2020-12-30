<?php include "./includes/header.php" ?>


<?php include "./includes/navigation.php" ?>

<div class="main-box">
    <div class="container">
        <div class="home-page">
            <div class="home-page-post">
                <?php
                if (isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];

                    $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 where post_id = $the_post_id";
                    $send_query = mysqli_query($connection, $view_query);

                    $query = "SELECT * FROM posts where post_id = $the_post_id";
                    $select_post_query_id = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_post_query_id)) {
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];
                        $post_views_count = $row['post_views_count'];



                ?>
                        <div class="home-page-post__image">
                            <img src="./images/<?php echo $post_image ?>" alt="">
                        </div>

                        <p class="infomation-post"><?php echo $post_author ?>• <?php echo $post_date ?> • <i class="fa fa-comment" aria-hidden="true"></i> <?php echo $post_comment_count ?></p>
                        <h1 class="homepage-title"><?php echo $post_title; ?></h1>
                        <ul class="group-tags">
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Travel</a></li>
                        </ul>

                        <p class="content">
                            <?php echo $post_content ?>
                        </p>

                <?php }
                } ?>
            </div>
        </div>

        <?php include "./includes/sidebar.php" ?>


    </div>
</div>

<?php
if (isset($_POST['create_comment'])) {
    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, 
        comment_content, comment_status, comment_date) ";
    $query .= "VALUE('$the_post_id', '{$comment_author}', '{$comment_email}', '{$comment_content}',
        'approve', now())";

    $create_comment_query =  mysqli_query($connection, $query);


    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
    $query .= "WHERE post_id = $the_post_id";
    $update_comment_count = mysqli_query($connection, $query);
}
?>

<div class="group-comments">
    <div class="container">
        <h1 class="title-comment">Comments</h1>
        <?php
        $query = "SELECT * FROM comments where comment_post_id = $the_post_id ";
        $query .= "AND comment_status = 'approve' ";
        $query .= "ORDER By comment_id DESC";
        $select_all_comments_query = mysqli_query($connection, $query);


        while ($row = mysqli_fetch_assoc($select_all_comments_query)) {
            $comment_author = $row['comment_author'];
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];

        ?>
            <div class="list-comment">
                <h1 class="author"><?php echo $comment_author; ?></h1>
                <p class="comment-date"><?php echo $comment_date; ?></p>
                <p class="content"><?php echo $comment_content; ?></p>
            </div>

        <?php }
        ?>
    </div>
</div>

<div class="comments">
    <div class="container">
        <div class="form-comments">
            <form action="" method="POST">
                <div class="form-input">
                    <label for="name">Username</label>
                    <input type="text" name="comment_author">
                </div>
                <div class="form-input">
                    <label for="email">Email</label>
                    <input type="text" name="comment_email">
                </div>
                <div class="form-input">
                    <label for="content">Content</label>
                    <textarea id="content" name="comment_content"></textarea>
                </div>
                <input type="submit" name="create_comment" value="Post Comment" class="btn-primary">
            </form>
        </div>
    </div>
</div>




<?php include "./includes/footer.php" ?>