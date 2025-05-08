<?php session_start(); ?>
<?php require "layouts/header.php"; ?>  
<?php require "../config/config.php"; ?> 

<?php 
$products = $conn->query("SELECT COUNT(*) as products_num FROM products");
$products->execute();
$allProducts = $products->fetch(PDO::FETCH_OBJ);

$categories = $conn->query("SELECT COUNT(*) as categories_num FROM categories");
$categories->execute();
$allCategories = $categories->fetch(PDO::FETCH_OBJ);

$admins = $conn->query("SELECT COUNT(*) as admins_num FROM admins");
$admins->execute();
$allAdmins = $admins->fetch(PDO::FETCH_OBJ);
?>

<div class="row">
  <!-- Products Card -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <p class="card-text">Number of products: <?php echo $allProducts->products_num; ?></p>
      </div>
    </div>
  </div>
  
  <!-- Categories Card -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>
        <p class="card-text">Number of categories: <?php echo $allCategories->categories_num; ?></p>
      </div>
    </div>
  </div>

  <!-- Admins Card -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>
        <p class="card-text">Number of admins: <?php echo $allAdmins->admins_num; ?></p>
      </div>
    </div>
  </div>
</div>

<?php require "layouts/footer.php"; ?>
