<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 
if(isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL);
    exit;
}

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $login = $conn->prepare("SELECT * FROM admins WHERE email = :email");
        $login->execute([':email' => $email]);
        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        if($fetch && password_verify($password, $fetch['mypassword'])) {
            $_SESSION['adminname'] = $fetch['adminname'];
            $_SESSION['admin_id'] = $fetch['id'];
            header("location: ".ADMINURL);
            exit;
        } else {
            echo "<script>alert('Password or email are wrong');</script>";
        }
    }
}
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" action="login-admins.php">
          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control" placeholder="Email" />
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" />
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-4">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>
