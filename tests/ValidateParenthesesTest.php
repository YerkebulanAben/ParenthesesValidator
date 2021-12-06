<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\ValidateParentheses;

/**
 * Тест валидации правильности раставленных открывающих и закрывающих скобок
 */
class ValidateParenthesesTest extends TestCase
{
    /**
     * Тест для проверки метода валидации
     *
     * @dataProvider dataProviderForValidate
     * @param string $actual
     * @param bool   $expected
     */
    public function testValidate(string $actual, bool $expected): void
    {
        $validation = new ValidateParentheses($actual);

        $this->assertEquals($validation->validate(), $expected);
    }

    public function dataProviderForValidate(): array
    {
        return [
            ['(())', true],
            ['(', false],
            [')', false],
            ['(()()()((((()))))', false],
            ['(()()())((()))', true],
        ];
    }
}