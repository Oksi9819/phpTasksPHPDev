<?php
ini_set('display_errors', 'Off');

include './Form/Form.php';

echo (new Form())->open(['action' => 'index.php', 'method' => 'POST']);
echo (new Form())->input(['type' => 'text', 'placeholder' => 'Ваше имя', 'name' => 'name']);
echo (new Form())->password(['placeholder' => 'Ваш пароль', 'name' => 'pass']);
echo (new Form())->textarea(['rows' => '10', 'cols' => '45', 'name' => 'text']);
echo (new Form())->submit(['value' => 'Отправить']);
echo (new Form())->close();