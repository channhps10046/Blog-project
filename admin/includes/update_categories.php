<form method="POST">
    <div class="form-group">
        <label for="category">category</label>
        <?php

        if (isset($_GET['edit'])) {
            $the_cat_id = $_GET['edit'];

            $query = "SELECT *FROM category where cat_id = $the_cat_id";
            $select_categories_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_query)) {
                $cat_id = ['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
                <input type="text" value="<?php echo $cat_title ?>" name="cat_title" class="form-control">
        <?php
            }
        }

        ?>

        <?php
        if (isset($_POST['update_categorie'])) {
            $the_cat_title = $_POST['cat_title'];
            $query = "Update category SET cat_title = '{$the_cat_title}' where cat_id = {$the_cat_id}";
            $update_category = mysqli_query($connection, $query);
        }
        ?>
    </div>
    <button type="submit" name="update_categorie" class="btn btn-primary">Update Category</button>
</form>