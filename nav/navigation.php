
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

  echo'    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand pr-5 pl-5" href="#">Shreeji It Solutions</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header ">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body bg-dark">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link pr-4" href="../welcome.php">Home</a>
                  </li>';
                  if (!$loggedin) {
                    echo ' <li class="nav-item">
                    <a class="nav-link pr-4" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pr-4" href="signup.php">Signup</a>
                </li>';
                }
                if ($loggedin) {
                    echo '<li class="nav-item">
                    <a class="nav-link pr-4" href="../products/product_cart.php">Product</a>
                </li>';
                }
                echo '
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pr-4" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Invoice
                    </a>
                    <div class="dropdown-menu pr-4" aria-labelledby="offcanvasNavbarDropdown">
                        <!-- <a class="dropdown-item pr-4" href="#action3"></a> -->
                        <a class="dropdown-item" href="../invoice/ta.php">Generate Invoice</a>
                        <a class="dropdown-item" href="../invoice/update.php">Update Invoice</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../invoice/print_invoice.php">Print Invoice</a>
                    </div>
                </li>
              
                <li class="nav-item pr-4">
                    <a class="nav-link" href="../backup/backup.php">Back Up</a>
                </li>
                <li class="nav-item pr-4">
                <a class="nav-link" href="./personal_info/personal.php">Profile</a>
            </li>
                <li class="nav-item text-right pr-4">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                

                
                </ul>
                </div>
            </div>
        </div>
    </nav>';
  ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                       
                        
            