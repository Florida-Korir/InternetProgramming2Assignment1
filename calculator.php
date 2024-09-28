<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 50px;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: inline-block;
        }
        input[type="number"], select {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 80%;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 1.5em;
            color: #333;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h1>PHP Calculator</h1>
    <form action="" method="post">
        <input type="number" name="num1" placeholder="First Number" required>
        <input type="number" name="num2" placeholder="Second Number (optional for sqrt and log)">
        
        <select name="operator">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponentiate">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root</option>
            <option value="logarithm">Logarithm</option>
        </select>
        
        <input type="submit" name="submit" value="Calculate">
    </form>

    <div class="result">
        <strong>Result:</strong> 
        <?php
        // Function to perform calculation based on the operator
        function calculate($num1, $num2, $operator) {
            switch($operator) {
                case 'add':
                    return $num1 + $num2;
                case 'subtract':
                    return $num1 - $num2;
                case 'multiply':
                    return $num1 * $num2;
                case 'divide':
                    return $num2 != 0 ? $num1 / $num2 : 'Division by zero';
                case 'exponentiate':
                    return pow($num1, $num2);
                case 'percentage':
                    return ($num1 / 100) * $num2;
                case 'sqrt':
                    return sqrt($num1);
                case 'logarithm':
                    return log($num1);
                default:
                    return 'Invalid Operation';
            }
        }

        $result = '';
        if (isset($_POST['submit'])) {
            $num1 = $_POST['num1'];
            $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;  // num2 is optional for some operations
            $operator = $_POST['operator'];

            if (is_numeric($num1) && (is_numeric($num2) || in_array($operator, ['sqrt', 'logarithm']))) {
                $result = calculate($num1, $num2, $operator);
            } else {
                $result = "Please enter valid numbers";
            }
        }
        echo $result;
        ?>
    </div>
</div>

</body>
</html>
