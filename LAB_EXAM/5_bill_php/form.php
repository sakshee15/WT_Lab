<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body{
            background-color:rgb(240,240,240);
        }
       .form-group{
         margin:50px auto;
         border:1px solid black;
         padding:20px;
       }
       button{
         margin: 20px;
       }
       h1{
        margin:50px auto;
       }
       table{
        width:800px;
       }
       table,td,th{
        border:1px solid white;
          margin: 50px auto;
          text-align:center;
          padding:5px;
       }
       tr:nth-child(odd) {
  background-color: rgb(150,212,212,0.6);
}
tr:nth-child(even) {
  background-color: rgb(150,212,212,0.3);
}
       .container{
        max-width:1000px;
        box-shadow: 4px 4px 8px rgb(212,212,212,0.5),-4px 4px 8px rgb(212,212,212,0.5),4px -4px 8px rgb(212,212,212,0.5),-4px -4px 8px rgb(212,212,212,0.5);
        padding: 50px;
        margin:auto;
        background-color:white;
       }

       .bill{
        border:1px solid green;
        border-radius:5px;
        background-color:rgb(0,255,0,0.1);
          padding:10px;
          margin-left:150px;
          font-size:30px;
          width:450px;
       }
       span{
        color:green;
        font-weight:bold;
       }
    </style>
</head>
<body>
    <div class="container"> 
        <div>
        <h1 class="text-center mb-5 mt-5"> Electricity Bill Calculator</h1>
         <form action="" method="post" class="mt-5">
            <div class="form-group">
                <label for="units"><b>Enter total units consumed:</b></label>
                <input type="number" name="units" id="units" class="form-control" required>
            <button type="submit" name="submit" class="btn btn-primary">Calculate Bill</button>
    </div>
        </form>
    </div>
    <?php
        if (isset($_POST['submit'])) {
            $units = (int) $_POST['units'];
            $price = 0;

            if ($units <= 50) {
                $price = $units * 3.5;
            } elseif ($units <= 150) {
                $price = 50 * 3.5 + ($units - 50) * 4;
            } elseif ($units <= 250) {
                $price = 50 * 3.5 + 100 * 4 + ($units - 150) * 5.2;
            } else {
                $price = 50 * 3.5 + 100 * 4 + 100 * 5.2 + ($units - 250) * 6.5;
            }

            echo "<div class='bill'";
            echo "<p>Your electricity bill is <span>Rs. $price </span></p>";
            echo "</div>";

            echo"<table>";
            echo"<tr><th>Unit Range</th><th>Cost per unit in Rs.</th><th>Calculated cost</th></tr>";
            if ($units <= 50) {
                echo"<tr><td>0-50</td><td>Rs. 3.50</td><td>Rs. ".$units * 3.50 ."</td></tr>";
            } elseif ($units <= 150) {
                echo"<tr><td>0-50</td><td>Rs. 3.50</td><td>Rs. 175</td></tr>";
                echo"<tr><td>51-150</td><td>Rs. 4.00</td><td>Rs.".($units-50)* 4 ."</td></tr>";
            } elseif ($units <= 250) {
                echo"<tr><td>0-50</td><td>Rs. 3.50</td><td>Rs. 175</td></tr>";
                echo"<tr><td>51-150</td><td>Rs. 4.00</td><td>Rs. 400</td></tr>";
                echo"<tr><td>151-250</td><td>Rs. 3.50</td><td>Rs.".($units-150)* 5.20 ."</td></tr>";
            } else {
                echo"<tr><td>0-50</td><td>Rs. 3.50</td><td>Rs. 175</td></tr>";
                echo"<tr><td>51-150</td><td>Rs. 4.00</td><td>Rs. 400</td></tr>";
                echo"<tr><td>151-250</td><td>Rs. 5.20</td><td>Rs. 520</td></tr>";
                echo"<tr><td>Above 250</td><td>Rs. 6.50</td><td>Rs. ".($units-250)* 6.50 ."</td></tr>";
            }
            echo"<tr><td colspan='2'>Total cost:</td><td>Rs. ".$price."</td></tr>";
            echo"</table>";
      }
    ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>