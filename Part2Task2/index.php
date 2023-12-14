<?php

use \Part2Task2\Form;

echo (new Form())->open(['action'=>'index.php', 'method'=>'POST']);
echo (new Form())->input(['type'=>'text', 'placeholder'=>'Ваше имя', 'name'=>'name']);
echo (new Form())->password(['placeholder'=>'Ваш пароль', 'name'=>'pass']);
echo (new Form())->submit(['value'=>'Отправить']);
echo (new Form())->close();