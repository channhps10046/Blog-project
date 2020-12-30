<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`) VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}');";
    $create_post_query = mysqli_query($connection, $query);

    if (!$create_post_query) {
        die("QUERY FAILED:" . mysqli_error($connection));
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="categories">Categories</label>
        <select name="post_category_id" id="">

            <?php
            $query = "SELECT * FROM category";
            $select_category = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_category)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                if ($cat_id == $post_category_id) {


                    echo "<option selected value='{$cat_id}'>{$cat_title}</option>";
                } else {

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            }
            ?>


        </select>

    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="">
            <option value="draft">Post status</option>
            <option value="published">published</option>
            <option value="draft">draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="body" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>