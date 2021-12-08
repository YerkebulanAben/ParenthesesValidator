<?php
namespace App;

/**
 * Класс валидации правильного кол-ва открывающих и закрывающих скобок
 */
class ValidateParentheses
{
    protected const VALID_SYMBOLS = ['(', ')'];
    /**
     * Строка для проверки
     *
     * @var string 
     */
    protected string $parens;

    /**
     * Конструктор
     *
     * @param string $parens
     */
    public function __construct(string $parens)
    {
        $this->parens = $parens;
    }

    /**
     * Валидация строки
     *
     * @return bool
     */
    public function validate(): bool
    {
        $parensArray = str_split($this->parens);
        $validator = 0;

        foreach ($parensArray as $item) {
            if (!in_array($item, self::VALID_SYMBOLS)) {
                throw new \InvalidArgumentException();
            }

            if ($item === '(') {
                $validator++;
            }

            if ($item === ')') {
                $validator--;
            }

            if ($validator < 0) {
                return false;
            }
        }

        return $validator == 0;
    }
}