<?php
require_once('includes/connection.php');

// DELETE QUERY
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `users` WHERE id = $id";
    $result = mysqli_query($con,$query);
    if($result) {
        echo "<script>alert('User Deleted');window.location.href = '/social';</script>";
    }
}
?>