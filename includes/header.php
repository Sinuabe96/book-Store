<?php

    session_start();
    define("APRURL", "http://localhost/book-Store");
    require dirname(dirname(__FILE__)) . "/config/config.php";

    if(isset($_SESSION['user_id'])) {
        $number = $conn->query("SELECT COUNT(*) as num_products FROM cart WHERE user_id='$_SESSION[user_id]'");
        $number->execute();
    
        $getNumber = $number->fetch(PDO::FETCH_OBJ);
    
    }
   
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Bookstore</title>

    <style>
        .nav-link:hover {
            color: #ffc107 !important; /* gold/yellow on hover */
        }
        .navbar-brand {
            font-size: 1.5rem;
        }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #343a40, #212529); padding: 10px 0;">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="<?php echo APRURL; ?>">📚 Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link text-white" aria-current="page" href="<?php echo APRURL; ?>">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-white" href="<?php echo APRURL; ?>/contact.php">Contact</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link text-white" href="<?php echo APRURL; ?>/categories/index.php">Categories</a>
                    </li>

                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item px-2">
                            <a class="nav-link text-white position-relative" href="<?php echo APRURL; ?>/shopping/cart.php">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">(<?php echo $getNumber->num_products; ?>)</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="<?php echo APRURL; ?>/auth/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item px-2">
                            <a class="nav-link text-white" href="<?php echo APRURL; ?>/auth/login.php">Login</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link text-white" href="<?php echo APRURL; ?>/auth/register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Your main content here -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>
  </body>
</html>
