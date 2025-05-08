<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?> 

<?php 

  
  $select = $conn->query("SELECT * FROM products");
  $select->execute();

  $products = $select->fetchAll(PDO::FETCH_OBJ);

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
             <a  href="<?php echo ADMINURL; ?>/products-admins/create-product.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($products as $product) : ?>
                    <tr>
                      <th scope="row"><?php echo $product->id; ?></th>
                      <td><?php echo $product->name; ?></td>
                      <td><a  href="<?php echo ADMINURL; ?>/products-admins/update-product.php?id=<?php echo $product->id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                      <td><a href="<?php echo ADMINURL; ?>/products-admins/delete-product.php?id=<?php echo $product->id; ?>" class="btn btn-danger  text-center ">Delete </a></td>
                    </tr>
                  <?php endforeach; ?>
             
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php"; ?>  