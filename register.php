<?php include "./includes/header.php" ?>


<?php include "./includes/navigation.php" ?>

<?php session_start(); ?>


<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password =  mysqli_real_escape_string($connection, $password);
        $password =  password_hash('$password', PASSWORD_BCRYPT, array('cost' => 12));

        $query = "INSERT INTO users (username, user_email, user_password, user_role) Value ('{$username}', '{$email}', '{$password}', 'subscriber')";
        $register_user_query = mysqli_query($connection, $query);

        $message = "Your Registration has been submitted";
    } else {
        $message = "Fields cannot be empty";
    }
} else {
    $message = '';
}
?>


<div class="container">
    <div class="modal-box" id="btnClose">
        <div class="group-form">
            <h1>Register</h1>
            <?php echo $message ?>
            <form method="POST">
                <div class="group-input-modal">
                    <input type="text" name="username" placeholder="Enter Username...">
                </div>

                <div class="group-input-modal">
                    <input type="text" name="email" placeholder="Enter Email Address...">
                </div>

                <div class="group-input-modal">
                    <input type="password" name="password" placeholder="Password">
                </div>

                <div class="group-input-modal">
                    <button id="button-close" name="register" class="btn" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include "./includes/footer.php" ?>