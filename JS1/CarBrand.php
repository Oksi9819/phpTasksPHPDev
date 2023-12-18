<?php

$carBrands = array('BMW', 'Mercedes', 'Skoda', 'Tesla', 'Volkswagen', 'Toyota', 'Infinity', 'Geely');

if (isset($_GET['num'])) {
    $num = (int)$_GET['num'];

    if ($num > 0 && $num <= count($carBrands)) {
        echo json_encode(array_slice($carBrands, 0, $num));
        exit;
    } else {
        echo json_encode(array('error' => 'Введенное число превышает количество марок автомобилей в массиве. Введите число не больше ' . count($carBrands) . '.'));
        exit;
    }
}