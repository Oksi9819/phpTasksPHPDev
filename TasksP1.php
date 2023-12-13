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



