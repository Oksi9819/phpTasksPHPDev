<?php


class Form
{
    private array $params = [];

    public function __construct()
    {
        $this->params = [];
    }

    private function setAttributes(array $attributes): string
    {
        $result = '';
        foreach ($attributes as $key=>$value) {
            $result .= $key . '="' . $value . '" ';
        }
        return $result;
    }

    public function input(array $attributes): string
    {
        $text = $this->setAttributes($attributes);
        return '<input ' . $text . '><br/>';
    }

    public function submit(array $attributes): string
    {
        $text = $this->setAttributes(array_merge(['type' => 'submit'], $attributes));
        return '<input ' . $text . '><br/>';
    }

    public function password(array $attributes): string
    {
        $text = $this->setAttributes(array_merge(['type' => 'password'], $attributes));
        return '<input ' . $text . '><br/>';
    }

    public function textarea(array $attributes): string
    {
        if (isset($attributes['value'])) {
            $value = $attributes['value'];
            unset($attributes['value']);
            $text = $this->setAttributes($attributes);
            return '<textarea ' . $text . '>' . $value . '</textarea><br/>';
        } else {
            $text = $this->setAttributes($attributes);
            return '<textarea ' . $text . '></textarea><br/>';
        }
    }

    public function open(array $attributes): string
    {
        $text = $this->setAttributes($attributes);
        return '<form ' . $text . '><br/>';
    }

    public function close(): string
    {
        return '</form>';
    }
}