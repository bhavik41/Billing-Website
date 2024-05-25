<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

?>

<?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
  } else {
    $loggedin = false;
  } 

  echo'    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Balaji Bio-Fuel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="welcome.php">Home</a>
                  </li>';
                  if (!$loggedin) {
                    echo ' <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>';
                }
                if ($loggedin) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="./products/product_cart.php">Product</a>
                </li>';
                }
                echo '
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Invoice
                    </a>
                    <div class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                        <!-- <a class="dropdown-item" href="#action3"></a> -->
                        <a class="dropdown-item" href="./invoice/ta.php">Generate Invoice</a>
                        <a class="dropdown-item" href="./invoice/update.php">Update Invoice</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./invoice/print_invoice.php">Print Invoice</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./personal_info/personal.php">Personal Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                

                
                </ul>
                </div>
            </div>
        </div>
    </nav>';
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                       
                        
            