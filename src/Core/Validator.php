<?php

namespace Core;

class Validator
{
    public static function stringZero($value)
    {
        $value = trim($value);
        return strlen($value) === 0;
    }
    public static function stringCount($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return $value >= $min && $value <= $max;
    }
    public static function isNumeric($value)
    {
        return ctype_digit((string)$value);
    }
    public static function isPositive($value)
    {
        return (int)$value >= 0;
    }
    public static function isHexColor($value)
    {
    }
}
