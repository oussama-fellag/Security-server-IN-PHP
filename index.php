<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="number" name="num1" placeholder="Number one" required>
            <select name="operator" required>
                <option value="add">+</option> 
                <option value="sub">-</option>
                <option value="mul">*</option>
                <option value="div">/</option> 
            </select> 
            <input type="number" name="num2" placeholder="Number two" required>
            <button type="submit">Calculate</button>
   </form>
   <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = filter_input(INPUT_POST, "num1", FILTER_VALIDATE_FLOAT);
        $num2 = filter_input(INPUT_POST, "num2", FILTER_VALIDATE_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        $error = false;

        if ($num1 === false || $num2 === false) {
            echo "<p class='calc-error'>Invalid input. Please enter valid numbers.</p>";
            $error = true;
        }

        if (empty($operator)) {
            echo "<p class='calc-error'>Please select an operator.</p>";
            $error = true;
        }

        if (!$error) {
            switch ($operator) {
                case "add":
                    $value = $num1 + $num2;
                    break;
                case "sub":
                    $value = $num1 - $num2;
                    break;
                case "mul":
                    $value = $num1 * $num2;
                    break;
                case "div":
                    if ($num2 != 0) {
                        $value = $num1 / $num2;
                    } else {
                        echo "<p class='calc-error'>Cannot divide by zero.</p>";
                        $error = true;
                    }
                    break;
                default:
                    echo "<p class='calc-error'>Error in operator code.</p>";
                    $error = true;
            }

            if (!$error) {
                echo "<p>The result is: $value</p>";
            }
        }
    }
    ?>
    
</body>
</html>
