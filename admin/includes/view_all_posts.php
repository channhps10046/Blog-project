<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Post view count</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['delete'])) {
            $the_post_id = $_GET['delete'];

            $query = "DELETE FROM posts where post_id = {$the_post_id}";
            $delete_post = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
        ?>
        <?php
        $query = "SELECT * FROM posts";
        $select_post_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_post_query)) {
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

            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";

            $query = "SELECT * FROM category where cat_id = $post_category_id";
            $select_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_title = $row['cat_title'];

                echo "<td>$cat_title</td>";
            }

            echo "<td>$post_status</td>";
            echo "<td><img style='width: 60px'  src='../images/$post_image'/></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='posts.php?reset=$post_id'>$post_views_count</a></td>";
            echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
            echo "<tr>";
        }
        ?>
    </tbody>
</table>
<?php
if (isset($_GET['reset'])) {
    $the_post_id = $_GET['reset'];
    $query = "UPDATE posts SET post_views_count = 0 Where post_id=" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}
?>