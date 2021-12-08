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
     * Тест для проверки метода валидации с правильными данными
     *
     * @dataProvider dataProviderValid
     * @param string $actual
     * @param bool   $expected
     */
    public function testValidateValidData(string $actual, bool $expected): void
    {
        $validation = new ValidateParentheses($actual);

        $this->assertEquals($validation->validate(), $expected);
    }

    /**
     * Тест для проверки метода валидации с неправильными данными
     *
     * @dataProvider dataProviderInvalid
     * @param string $data
     */
    public function testValidateInvalidData(string $data): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $validation = new ValidateParentheses($data);

        $validation->validate();
    }

    public function dataProviderValid(): array
    {
        return [
            ['(())', true],
            ['(', false],
            [')', false],
            ['(()()()((((()))))', false],
            ['(()()())((()))', true],
        ];
    }

    public function dataProviderInvalid(): array
    {
        return [
            ['qdqwdq'],
            ['dqwdqdqw'],
            ['dqwdqdqdq'],
        ];
    }
}