<div class="container">
    <div class="group-sidebar">
        <div class="sidebar">
            <h2>Popular Posts</h2>
            <!-- <div class="border"></div> -->
            <?php
            $query = "SELECT * FROM posts where post_views_count <= 5 LIMIT 4";
            $select_top_post = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_top_post)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_comment_count = $row['post_comment_count'];
                $post_category_id = $row['post_category_id'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
            ?>

                <div class="col-1">
                    <div class="col-1__image">
                        <img src="./images/<?php echo $post_image; ?>" alt="">
                    </div>
                    <div class="col-1__title">
                        <a href="post.php?p_id=<?php echo $post_id; ?>" style="text-decoration: none; color: black">
                            <h3><?php echo $post_title; ?></h3>
                        </a>
                        <p class="date"><?php echo $post_date; ?></p>
                    </div>
                </div>

            <?php
            }
            ?>





        </div>
        <div class="group-categories">
            <h2>Categories</h2>

            <?php
            $query = "SELECT * FROM category";
            $select_all_category = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_all_category)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<div class='category'>
                        <a href='category.php?category=$cat_id'>$cat_title</a>
                        <span>(12)</span>
                    </div>";
            }
            ?>

            <!-- <div class="category">
                <a href="#">Travel</a>
                <span>(12)</span>
            </div>

            <div class="category">
                <a href="#">Lifestyle</a>
                <span>(12)</span>
            </div>

            <div class="category">
                <a href="#">Business</a>
                <span>(12)</span>
            </div>

            <div class="category">
                <a href="#">Aventure</a>
                <span>(12)</span>
            </div> -->
        </div>

        <div class="group-tags">
            <h2>Tags</h2>
            <ul>
                <li><a href="#">Travel</a></li>
                <li><a href="#">Avanture</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
            </ul>

        </div>
    </div>

</div>