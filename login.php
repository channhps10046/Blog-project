<?php include "./includes/header.php" ?>


<?php include "./includes/navigation.php" ?>

<?php session_start(); ?>


<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users where username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
    }

    $password = crypt($password, $db_user_password);

    if ($username == $db_username && $password == $db_user_password) {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        header("Location: ./admin/");
    } else {
        header('Location: index.php');
    }
}
?>


<div class="container">
    <div class="modal-box" id="btnClose">
        <div class="group-form">
            <h1>Login</h1>
            <form method="POST">
                <div class="group-input-modal">
                    <input type="text" name="username" placeholder="Enter Email Address...">
                </div>

                <div class="group-input-modal">
                    <input type="password" name="password" placeholder="Password">
                </div>

                <div class="group-input-modal">
                    <button id="button-close" name="login" class="btn" type="submit">Login</button>
                </div>
            </form>
            <a class="create-account" href="register.php">Create an Account</a>
        </div>
    </div>
</div>



<?php include "./includes/footer.php" ?>