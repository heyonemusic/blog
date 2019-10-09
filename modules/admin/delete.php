<?php

require_once '../../includes/connect.php';
require_once '../../includes/auth.php';
$id = $_REQUEST['id'];
$delete = "DELETE FROM posts WHERE id=$id";
mysqli_query($delete);

?>