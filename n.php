<?php
if (isset($_post["answer"])) {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = $_POST['operator'] ?? '';

    if ($num1 === false || $num2 === false) {
        $result = "Please enter valid numbers.";
    } else {
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                $result = ($num2 != 0) ? $num1 / $num2 : "Division by zero error.";
                break;
            default:
                $result = "Invalid operator selected.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> Calculator.PHP</title>
    <form method="post">
        enetr num1<input type="text" name="num1" placeholder="num1" required><br><br>
        enetr num2<input type="text" name="num1" placeholder="$num2" required><br><br>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num1" placeholder="$num1" required>
        <input type="text" name="num2" placeholder="$num2" required>
        <button type="submit">Calculate</button>
    </form>
    <?php if ($result !== ''): ?>
        <h3>Result: <?= ($result) ?></h3>
    <?php end if; ?>
</body>
</html>