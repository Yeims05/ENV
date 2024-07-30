<?php
if (!function_exists('format_cop')) {

    function format_cop(float $value): string
    {
        return "COP " . number_format($value, 0, ',', '.');
    }
}
