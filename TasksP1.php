<?php

//Task1
function sumOfDigits ($input): int
{
    if((int)($input)) {
        $count = strlen($input);
        $numSum = 0;
        for ($i = 0; $i < $count; $i ++) {
            $numSum += $input % 10;
            $input /= 10;
        }
        return $numSum;
    } else throw new Exception('Only number should be entered.');
}

if (isset($_POST['input_number'])) {
    $input = $_POST['input_number'];
    try {
        echo(sumOfDigits($input));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

//Task2
function amountOfDigit5 ($input): int
{
    if((int)($input)) {
        $count = strlen($input);
        $amount = 0;
        for ($i = 0; $i < $count; $i ++) {
            if ($input[$i] == 5) {
                $amount += 1;
            }
        }
        return $amount;
    } else throw new Exception('Only number should be entered.');
}

//Task3
function divisibleBy5 (): int
{
    $sumOfDivisibleBy5 = 0;
    for($i = 20; $i < 46; $i ++) {
        if (fmod($i, 5) == 0) {
            $sumOfDivisibleBy5 +=$i;
        }
    }
    return $sumOfDivisibleBy5;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks PHP Part 1</title>
</head>
<body>
<!-- Task 1 -->
<h3>Задача 1. Данная форма суммирует цифры числа.</h3>
<form action="" method="post" id ="task1">
    <label>Введите число.</label>
    <label for="input_number"></label><label>
        <input type="text" name="input_number">
    </label>
    <input type="submit" value="Узнать">
</form>

<!-- Task 2 -->
<h3>Задача 2. Данная форма считает количество цифр 5 в числе.</h3>
<form action="" method="post" id ="task2">
    <label>Введите число.</label>
    <label for="input_number"></label><label>
        <input type="text" name="input_number2">
    </label>
    <input type="submit" value="Посчитать">
</form>
<?php
if (isset($_POST['input_number2'])) {
    ?><span>Ответ:</span><?php
    $input = $_POST['input_number2'];
    try {
        echo(amountOfDigit5($input));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<!-- Task 3 -->
<h3>Задача 3. Ответ: Сумма чисел, которые делятся на 5 в числовом диапазоне 20-45 включительно, равна <?php echo divisibleBy5(); ?>.</h3>
</body>
</html>