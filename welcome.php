
<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'nav/navigation.php';
echo ' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
ob_end_flush(); // Flush the output buffer and send its contents to the browser



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Welcome - <?php $_SESSION['Username'] ?></title>
    <style>
        body{
            z-index: -1;

        }
        .containerrr {
            font-family: 'Arial', sans-serif;
width:100%;
background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url("wellcome.jpg");
            background-repeat: no-repeat;
  background-size: auto;
  opacity: 1;
  z-index: -1;


        }

        .logo-container {
            text-align: center;
        }

        .logo {
            font-size: 6em;
            color: black;
            -webkit-text-stroke: 1px white;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
            overflow: hidden;



        }

        .char {
            display: inline-block;
            opacity: 1;
            transform: translateY(1em);
            animation: fadeInUp 0.5s forwards;
            z-index: +1;
            
        }

        .char.space {
            width: 0.5em; /* Adjust the space width as needed */
            display: inline-block;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .char:nth-child(1) {
            animation-delay: 0.1s;
        }

        .char:nth-child(2) {
            animation-delay: 0.2s;
        }

        .char:nth-child(3) {
            animation-delay: 0.3s;
        }

        .char:nth-child(4) {
            animation-delay: 0.4s;
        }

        .char:nth-child(5) {
            animation-delay: 0.5s;
        }

        .animated-logo {
            animation: pulse 1s infinite;
        }

     
    </style>
  </head>
  <body>

    
    <div class="containerrr d-flex align-items-center logo-container">
    <div class="logo animated-logo">

        <?php
            $logoText = "Welcome to Balaji world";
            $characters = str_split($logoText);
            foreach ($characters as $index => $char) {
                if ($char === ' ') {
                    echo '<span class="char space"></span>';
                } else {
                    echo '<span class="char" style="animation-delay: ' . ($index * 0.1) . 's;">' . $char . '</span>';
                }
            }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>