<?php
include("../../includes/check_login.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/User.php");

$user_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: users_view.php");
}

$user = new User($db);
$user->delete_user($user_id);

header("Location: users_view.php")

?>