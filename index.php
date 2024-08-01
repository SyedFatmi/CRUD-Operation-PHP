<?php require_once('includes/header.php');

// INSERT USERS
if(isset($_POST['user_submit'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    // echo $name;
    $query = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`) VALUES ('$name','$email','$password')";
    $insert = mysqli_query($con, $query);
    if($insert) {
        echo "<script>alert('User Added Success');window.location.href = '/social';</script>";
    }
    die();
}
?>
    <div class="container-fluid pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <form class="form-control" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="user_name" placeholder="Enter Name" name="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="user_email" placeholder="Enter Email" name="user_email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="user_submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12">
                    <h2>All Users</h2>
                <table id="myTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // READ/SHOW DATA
                        $query = "SELECT * FROM `users`";
                        $mysqli = mysqli_query($con, $query);
                        $i = 1;
                        while($row = mysqli_fetch_array($mysqli)) {
                            echo "<tr>";
                            echo "<td>".$i++."</td>";
                            echo "<td>".$row['user_name']."</td>";
                            echo "<td>".$row['user_email']."</td>";
                            echo "<td>".$row['user_pass']."</td>";
                            echo "<td><a href='/social/delete.php?id=". $row['id'] ."' class='btn btn-danger'>Delete</a> <a href='/social/update.php?id=". $row['id'] ."' class='btn btn-warning'>Update</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

   <?php require_once('includes/footer.php'); ?>
   <script>
    jQuery(document).ready(function(){
        let table = new DataTable('#myTable');
    });
   </script>