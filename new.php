<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Information Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .containerr {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row; /* Add this line to make subcontainers align horizontally */
        }

        .subcontainer {
            flex: 1; /* Added to distribute space evenly among subcontainers */
            margin: 0 10px; /* Added to provide some spacing between subcontainers */
        }
    </style>
</head>
<body>
<form action="submit_form.php" method="post"></form>
    <div class="containerr mt-4">
        
            <div class="subcontainer">
                <div class="form-group">
                    <label for="buyerName">Buyer Name:</label>
                    <input type="search" list="browsers" class="form-control"  id="buyerName" name="buyerName" /></label>
<datalist id="browsers">
  <option value="Chrome">
  <option value="Firefox">
  <option value="Internet Explorer">
  <option value="Opera">
  <option value="Safari">
  <option value="Microsoft Edge">
</datalist>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
            </div>

            <div class="subcontainer">
                <div class="form-group">
                    <label for="gstin">GSTIN:</label>
                    <input type="text" class="form-control" id="gstin" name="gstin" required>
                </div>

                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
            </div>

            <div class="subcontainer">
                <div class="form-group">
                    <label for="stateName">State Name:</label>
                    <input type="text" class="form-control" id="stateName" name="stateName" required>
                </div>
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Bootstrap JS and Popper.js (required for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
