<?php

namespace MonteiroFutila\SocialNumber;

use MonteiroFutila\SocialNumber\Contracts\SocialNumberInterface;

class SocialNumber implements SocialNumberInterface
{

    public function __construct()
    {
    }

    /**
     * Convert number to its human-readable equivalent for optimal display on social media platforms
     *
     * @param  int|float  $number
     * @param  int  $precision
     * @param  bool  $abbreviate
     * @return string
     */
    public static function format(int|float $number, int $precision = 0, bool $abbreviate = false): string
    {
        return static::short($number, $precision) . static::summarize($number, $abbreviate);
    }

    /**
     * Converts a number into a short representation
     *
     * @param  int|float  $number
     * @param  int  $precision
     * @return string
     */
    public static function short(int|float $number, int $precision = 0): string
    {
        return number_format($number / static::scale($number), $precision);
    }

    /**
     * Calculates the decimal exponent associated with the number.
     *
     * @param  int|float $number
     * @return int
     */
    public static function exponent(int|float $number): int
    {
        $numberExponent = floor(log10(abs($number)));
        $displayExponent = $numberExponent - ($numberExponent % 3);
        return $displayExponent;
    }

    /**
     * Returns the scale (10 raised to the exponent) associated with the number
     *
     * @param  int|float $number
     * @return int
     */
    public static function scale(int|float $number): int
    {
        return pow(10, static::exponent($number));
    }

    /**
     * Returns a string that represents the units of a number
     *
     * @param  int|float $number
     * @param  bool $abbreviate
     * @return string
     */
    public static function summarize(int|float $number, bool $abbreviate = false): string
    {
        $displayExponent = static::exponent($number);

        $units = $abbreviate ?
            [
                3 => ' thousand',
                6 => ' million',
                9 => ' billion',
                12 => ' trillion',
                15 => ' quadrillion',
            ] :
            [
                3 => 'K',
                6 => 'M',
                9 => 'B',
                12 => 'T',
                15 => 'Q',
            ];

        return $units[$displayExponent] ?? '';
    }
}