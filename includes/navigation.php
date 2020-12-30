<nav class="nav">
    <div class="container">
        <div class="top-menu">
            <h1><a href="index.php">Wordify</a></h1>
            <ul class="main-nav">
                <li><a href="index.php" class="active">home</a></li>
                <?php
                $query = "SELECT * FROM category";
                $select_category_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_category_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                }
                ?>
                <li><a href="#">contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="border"></div>
    </div>
</nav>