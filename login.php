<?php include 'header.php';
if(isset($_SESSION['logged_in'])){
    header("location:index.php");
    
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $check = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
    $check->execute([$email]);

    foreach($check as $value){
        if($value['user_email'] == $email && password_verify($pass, $value['user_pass'])){
            
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $value['user_id'];

            header("location: index.php");
        }else{
            $msg = "Email or Password incorrect!";
            header("Location: login.php?msg=$msg");
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 shadow p-4  mt-4">
        <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?= $_GET['msg']; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        <center>
            <form method="POST" action="login.php">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input type="email" placeholder="Email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input type="password" placeholder="Password" class="form-control" id="pass" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-warning" name="login">Login</button>
                <a class="btn btn-danger" href="register.php">Register</a>
            </form>
        </center>
        </div>
    </div>
</div>
</body>
</html>