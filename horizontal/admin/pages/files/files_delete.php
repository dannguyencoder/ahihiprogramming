<?php
include("../../includes/check_login.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/File.php");

$file_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: files_view.php");
}

$file_obj = new File($db);
$file_obj->delete_file($file_id);

header("Location: files_view.php")

?>