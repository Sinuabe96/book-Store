<?php require "../layouts/header.php"; ?>  
<?php require "../../config/config.php"; ?> 
<?php 

    if(isset($_GET['id'])) {

      $id = $_GET['id'];

      $select = $conn->query("SELECT * FROM products WHERE id='$id'");
      $select->execute();

      $product = $select->fetch(PDO::FETCH_OBJ);




      if(isset($_POST['submit'])) {
        if(empty($_POST['name']) OR empty($_POST['description'])) {
          echo "<script>alert('one or more inputs are empty');</script>";
        } else {
          
          unlink("images/".$product->image."");

          $name = $_POST['name'];
          $description = $_POST['description'];
          $image = $_FILES['image']['name'];
    
          $dir = "images/" . basename($image);
    
    
          $update = $conn->prepare("UPDATE products SET name=:name, description=:description, image=:image WHERE
          id='$id'");

          $update->execute([
            ":name" => $name,
            ":description" => $description,
            ":image" => $image,
          ]);
    
          if(move_uploaded_file($_FILES['image']['tmp_name'],  $dir)) {
            header("location: ".ADMINURL."/products-admins/show-products.php");
          }
    
        }
      }



    } else {
      
    }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Product</h5>
          <form method="POST" action="update-product.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" value="<?php echo $product->name; ?>" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                    <?php echo $product->description; ?>
                    </textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label><br>
                     <img src="images/<?php echo $product->image; ?>" alt="img" width=200 height=200 /> 
                     <br>
                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>


      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>