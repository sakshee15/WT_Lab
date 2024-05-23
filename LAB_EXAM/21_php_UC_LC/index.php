<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>21_PHP_LC_UC</title>
    <style>
        body{
            background-color: #f0f0f0;
        }
        form {
            background-color: white;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0 ,0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #aaa;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 10px 15px;
            background-color: #4285f4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 0;
        }

        input[type="submit"]:hover {
            background-color: #357ae8;
        }

        .answer {
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <form method="post">
        <label for="string">Enter string: </label>
        <input name="string" type="text"></input><br>
        <input name="toUpper" type="submit" value="Convert to Uppercase">
        <input name="toLower" type="submit" value="Convert to Lowercase">
        <input name="capitalise" type="submit" value="Capitalise first character">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $input = $_POST['string'];
        if (isset($_POST['toUpper'])) {
            echo "<div class='answer'>Answer : " . strtoupper($input) . "<div>";
        } elseif (isset($_POST['toLower'])) {
            echo "<div class='answer'>Answer : " . strtolower($input) . "<div>";
        } elseif (isset($_POST['capitalise'])) {
            echo "<div class='answer'>Answer : " . ucfirst($input) . "<div>";
        }
    }
    ?>
</body>

</html>