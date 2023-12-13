<?php

//Task1
function sumOfDigits($input): int
{
    if ((int)($input)) {
        $count = strlen($input);
        $numSum = 0;
        for ($i = 0; $i < $count; $i++) {
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
function amountOfDigit5($input): int
{
    if ((int)($input)) {
        $count = strlen($input);
        $amount = 0;
        for ($i = 0; $i < $count; $i++) {
            if ($input[$i] == 5) {
                $amount += 1;
            }
        }
        return $amount;
    } else throw new Exception('Only number should be entered.');
}

//Task3
function divisibleBy5(): int
{
    $sumOfDivisibleBy5 = 0;
    for ($i = 20; $i < 46; $i++) {
        if (fmod($i, 5) == 0) {
            $sumOfDivisibleBy5 += $i;
        }
    }
    return $sumOfDivisibleBy5;
}

//Task4
function minMaxOfArr(): array
{
    $randArr = array();
    for ($i = 0; $i < 10; $i++) {
        $randArr[] = rand(0, 1000);
    }
    echo '<pre>';
    print_r($randArr);
    echo '</pre>';
    $keyMin = array_search(min($randArr), $randArr);
    $keyMax = array_search(max($randArr), $randArr);
    list($randArr[$keyMax], $randArr[$keyMin]) = array($randArr[$keyMin], $randArr[$keyMax]);
    return $randArr;
}

//Task5
function shortenFullName(string $fullName): string
{
    $fullNameArr = explode(' ', trim($fullName));
    $fullNameArr[1] = mb_substr($fullNameArr[1], 0, 1) . '.';
    $fullNameArr[2] = mb_substr($fullNameArr[2], 0, 1) . '.';
    return implode(' ', $fullNameArr);
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
<form action="" method="post" id="task1">
    <label>Введите число.</label>
    <label for="input_number"></label><label>
        <input type="text" name="input_number">
    </label>
    <input type="submit" value="Узнать">
</form>

<!-- Task 2 -->
<h3>Задача 2. Данная форма считает количество цифр 5 в числе.</h3>
<form action="" method="post" id="task2">
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
<h3>Задача 3. Ответ: Сумма чисел, которые делятся на 5 в числовом диапазоне 20-45 включительно,
    равна <?php echo divisibleBy5(); ?>.</h3>

<!-- Task 4 -->
<h3>Задача 4. Создать массив, наполнить его случайными значениями (можно использовать функцию rand), найти максимальное
    и минимальное значение массива и поменять их местами.</h3>
<p>Результат: </p><?php echo '<pre>';
print_r(minMaxOfArr());
echo '</pre>'; ?>

<!-- Task 5 -->
<h3>Задача 5. Cоздание сокращенного варианта ФИО.</h3>
<form action="" method="post" id="task5">
    <label>Введите ФИО полностью.</label>
    <label for="input_number"></label><label>
        <input type="text" name="input_full_name">
    </label>
    <input type="submit" value="Преобразовать">
</form>
<p>Результат:
<?php
if (isset($_POST['input_full_name'])) {
    echo shortenFullName($_POST['input_full_name']);
}
?>
</p>
</body>
</html>