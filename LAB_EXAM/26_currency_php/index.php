<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            background-color: #e7f3e4;
            color: #4CAF50;
            text-align: center;
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Currency Converter</h2>
        <form method="post" action="">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" placeholder="Enter amount" required>

            <label for="from_currency">From Currency:</label>
            <select name="from_currency" required>
                <?php
                // Define exchange rates (as of a certain date)
                $exchange_rates = [
                    'USD' => 1.0,
                    'EUR' => 0.91,
                    'GBP' => 0.79,
                    'INR' => 83.00,
                    // Add more currencies as needed
                ];
                foreach ($exchange_rates as $currency => $rate) : ?>
                    <option value="<?php echo $currency; ?>"><?php echo $currency; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="to_currency">To Currency:</label>
            <select name="to_currency" required>
                <?php foreach ($exchange_rates as $currency => $rate) : ?>
                    <option value="<?php echo $currency; ?>"><?php echo $currency; ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Convert">
        </form>

        <?php
        // Function to perform currency conversion
        function convertCurrency($amount, $from_currency, $to_currency, $exchange_rates)
        {
            if (isset($exchange_rates[$from_currency]) && isset($exchange_rates[$to_currency])) {
                $converted_amount = $amount * ($exchange_rates[$to_currency] / $exchange_rates[$from_currency]);
                return number_format($converted_amount, 2); // Format to 2 decimal places
            } else {
                return "Invalid currency code";
            }
        }

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $from_currency = strtoupper($_POST['from_currency']); // Convert to uppercase for consistency
            $to_currency = strtoupper($_POST['to_currency']); // Convert to uppercase for consistency

            // Perform conversion
            $converted_amount = convertCurrency($amount, $from_currency, $to_currency, $exchange_rates);

            // Display result
            echo "<div class='result' style='display:block;'>{$amount} {$from_currency} is equal to {$converted_amount} {$to_currency}</div>";
        }
        ?>
    </div>

</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 80%;
            background-color: white;
            flex-direction: column;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 3px;
            max-width: 500px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input,
        select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 10px;
            color: green;
            font-size: 1.5em;
            font-weight: bold;
            background-color: rgba(0, 240, 0, 0.1);
            border: 0.5px solid green;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $exchange = [
            'USD' => 1.0,
            'EUR' => 0.91,
            'GBP' => 0.79,
            'INR' => 83.00,
        ];
        ?>
        <form method="post">
            <label for="amount">Enter amount:</label>
            <input name="amount" type="number" placeholder="Enter the amount" required>

            <label for="from">From Currency:</label>
            <select name="from" required>
                <?php foreach ($exchange as $curr => $rate) : ?>
                    <option value="<?php echo $curr ?>"><?php echo $curr ?></option>
                <?php endforeach; ?>
            </select>

            <label for="to">To Currency:</label>
            <select name="to" required>
                <?php foreach ($exchange as $curr => $rate) : ?>
                    <option value="<?php echo $curr ?>"><?php echo $curr ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $amount = $_POST['amount'];
            $from_currency = strtoupper($_POST['from']);
            $to_currency = strtoupper($_POST['to']);

            if (isset($exchange[$from_currency]) && isset($exchange[$to_currency])) {
                $result = $amount * $exchange[$to_currency] / $exchange[$from_currency];
                echo "<div class='result'> {$amount} {$from_currency} is equal to " . number_format($result, 2) . " {$to_currency}</div>";
            }
        }
        ?>
    </div>
</body>

</html>
