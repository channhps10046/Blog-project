<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Admin</th>
            <th>subscriber</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";
            echo "<td><a href='users.php?change_to_admin=$user_id'>admin</a></td>";
            echo "<td><a href='users.php?change_to_sub=$user_id'>subscriber</a></td>";
            echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
            echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $the_user_id = $_GET['delete'];
    $query = "DELETE FROM users where user_id = $the_user_id";
    $delete_user_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if (isset($_GET['change_to_admin'])) {
    $the_admin_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' where user_id = $the_admin_id";
    $change_admin_query = mysqli_query($connection, $query);
    header('Location: users.php');
}

if (isset($_GET['change_to_sub'])) {
    $the_sub_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'subscriber' where user_id = $the_sub_id";
    $change_sub_query = mysqli_query($connection, $query);
    header('Location: users.php');
}
?>