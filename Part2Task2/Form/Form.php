<?php


namespace Part2Task2;


class Form
{
    private array $params=[];

    public function __construct()
    {
        $this->params = $_REQUEST;
    }

    private function setAttributes(array $attributes) : string
    {
        $result = '';
        foreach ($attributes as $attribute) {
            $result .= key($attributes) . $attribute;
        }
        return $result;
    }

    public function input(array $attributes) : string
    {
        $text = $this->setAttributes($attributes);
        return '<input ' . $text . '>';
    }

    public function submit(array $attributes) : string
    {
        array_unshift($attributes, ['type' => 'submit']);
        $text = $this->setAttributes($attributes);
        return '<input ' . $text . '>';
    }

    public function password(array $attributes) : string
    {
        array_unshift($attributes, ['type' => 'password']);
        $text = $this->setAttributes($attributes);
        return '<input ' . $text . '>';
    }

    public function textarea(array $attributes) : string
    {
        if (isset($attributes['value'])) {
            $value = $attributes['value'];
            unset($attributes['value']);
            $text = $this->setAttributes($attributes);
            return '<textarea ' . $text . '>' . $value. '</textarea>';
        } else {
            $text = $this->setAttributes($attributes);
            return '<textarea ' . $text . '</textarea>';
        }
    }

    public function open(array $attributes) : string
    {
        $text = $this->setAttributes($attributes);
        return '<form ' . $text . '>';
    }

    public function close() : string
    {
        return '</form>';
    }
}