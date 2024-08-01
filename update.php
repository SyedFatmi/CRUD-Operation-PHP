<?php require_once('includes/header.php');
// GET ID TO SHOW USER DATA
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM `users` WHERE id = $id";
    $mysqli_query = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($mysqli_query);
}

// UPDATE USER
if(isset($_POST['user_update'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $user_id = $_POST['user_id'];
    $password = $_POST['user_password'];

    $query = "UPDATE `users` SET `user_name`='$name',`user_email`='$email',`user_pass`='$password' WHERE id = $user_id";
    $run = mysqli_query($con, $query);
    if($run) {
        echo "<script>alert('User Update Success');window.location.href = '/social';</script>";
    }
}
?>
<div class="container-fluid pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Update User</h2>
                <form class="form-control" method="POST" action="">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="user_name" placeholder="Enter Name" name="user_name" required value="<?php echo $result['user_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="user_email" placeholder="Enter Email" name="user_email" required value="<?php echo $result['user_email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user_password" required value="<?php echo $result['user_pass']; ?>">
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $result['id']; ?>">
                    <button type="submit" class="btn btn-primary" name="user_update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>