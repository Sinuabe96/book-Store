<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 
if(!isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
    exit;
}

if(isset($_POST['submit'])) {
    if(empty($_POST['adminname']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $adminname = $_POST['adminname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO admins (adminname, email, mypassword) VALUES (:adminname, :email, :mypassword)");
        $insert->execute([
            ':adminname' => $adminname,
            ':email' => $email,
            ':mypassword' => $password,
        ]);

        header("location: ".ADMINURL."/admins/admins.php");
        exit;
    }
}
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5">Create Admin</h5>
        <form method="POST" action="create-admins.php">
          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control" placeholder="Email" />
          </div>
          <div class="form-outline mb-4">
            <input type="text" name="adminname" class="form-control" placeholder="Username" />
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" />
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-4">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>
