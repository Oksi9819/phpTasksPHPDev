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

//Task6
function isTrafficColor(int $time): string
{
    $a = $time % 5;
    if ($a == 0) {
        return 'red';
    } elseif ($a > 3) {
        return 'red';
    } else {
        return 'green';
    }
}

//Task7
function isLeapYear(int $year): bool
{
    if ($year < 1 || $year > 9999) {
        throw new Exception('The number must be from 1 to 9999');
    } elseif ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                return true;
            } else return false;
        }
        return true;
    } else return false;
}

//Task8
function isCardValue(int $card): string
{
    if ((int)($card)) {
        if ($card < 6 || $card > 14) {
            throw new Exception('The number must be more than 5 and less than 15, since a reduced deck of cards (36 pcs.) is being considered.');
        } elseif ($card === 6) {
            return 'шестерка';
        } elseif ($card === 7) {
            return 'семерка';
        } elseif ($card === 8) {
            return 'восьмерка';
        } elseif ($card === 9) {
            return 'девятка';
        } elseif ($card === 10) {
            return 'десятка';
        } elseif ($card === 11) {
            return 'валет';
        } elseif ($card === 12) {
            return 'дама';
        } elseif ($card === 13) {
            return 'король';
        } else return 'туз';
    } else throw new Exception('Only number should be entered.');
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
<h3>Задача 5. Cоздать сокращенный вариант ФИО.</h3>
<form action="" method="post" id="task5">
    <label>Введите ФИО полностью.</label>
    <label for="input_number"></label><label>
        <input type="text" name="input_full_name">
    </label>
    <input type="submit" value="Преобразовать">
</form>
<p>
    <?php
    if (isset($_POST['input_full_name'])) {
        echo shortenFullName($_POST['input_full_name']);
    }
    ?>
</p>

<!-- Task 6 -->
<h3>Задача 6. Программа определяет, какого цвета сейчас горит сигнал светофора. Введенное число означает количество
    минут, прошедших с начала часа.</h3>
<form action="" method="post" id="task6">
    <label>Введите число</label>
    <label for="input_number"></label><label>
        <input type="number" name="input_time">
    </label>
    <input type="submit" value="Узнать сигнал светофора">
</form>
<p>
    <?php
    if (isset($_POST['input_time'])) {
        echo isTrafficColor($_POST['input_time']);
    }
    ?>
</p>

<!-- Task 7 -->
<h3>Задача 7. Программа определяет, является ли введенный год вискосным.</h3>
<form action="" method="post" id="task7">
    <label>Введите число</label>
    <label for="input_number"></label><label>
        <input type="number" name="input_year">
    </label>
    <input type="submit" value="Узнать год">
</form>
<p>
    <?php
    if (isset($_POST['input_year'])) {
        try {
            if (isLeapYear($_POST['input_year'])) {
                echo 'Год високосный.';
            } else {
                echo 'Год не високосный.';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>
</p>

<!-- Task 8 -->
<h3>Задача 8. Программа выводит достоинство карты по заданному номеру, который вводит пользователь.</h3>
<form action="" method="post" id="task8">
    <label>Введите число</label>
    <label for="input_number"></label><label>
        <input type="number" name="input_card">
    </label>
    <input type="submit" value="Узнать достоинство карты">
</form>
<p>
    <?php
    if (isset($_POST['input_card'])) {
        try {
            echo isCardValue($_POST['input_card']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>
</p>
</body>
</html>