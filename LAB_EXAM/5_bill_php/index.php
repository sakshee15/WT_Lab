<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Bill</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .container {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            background-color: white;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            margin: 10px auto;
            border-radius: 5px;
            padding: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4285f4;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #357ae8;
        }
        p {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Electric Bill Calculator</h1>
        <form method="post">
            <label for="units">Enter number of units consumed:</label>
            <input type="number" name="units" placeholder="Enter the number of units consumed">
            <input type="submit" value="Calculate">
        </form>
        <?php
           if($_SERVER['REQUEST_METHOD'] == "POST"){
                $units = $_POST['units'];
                $bill = 0;
                if($units <= 50){
                    $bill = $units * 3.50;
                } else if($units <= 150){
                    $bill = 50 * 3.50 + ($units - 50) * 4.0;
                } else if($units <= 250){
                    $bill = 50 * 3.50 + 100 * 4.0 + ($units - 150) * 5.2;
                } else {
                    $bill = 50 * 3.50 + 100 * 4.0 + 100 * 5.2 + ($units - 250) * 6.5;
                }
                echo "<h3>Your electric bill is RS. " . number_format($bill, 2) . "</h3>";
           }
        ?>
    </div>
</body>
</html>
