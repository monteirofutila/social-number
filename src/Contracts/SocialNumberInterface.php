<?php

namespace MonteiroFutila\SocialNumber\Contracts;

interface SocialNumberInterface
{
    public static function format(int|float $number, int $precision, bool $abbreviate);
    public static function short(int|float $number, int $precision);
    public static function exponent(int|float $number);
    public static function scale(int|float $number);
    public static function summarize(int|float $number, bool $abbreviate);
}