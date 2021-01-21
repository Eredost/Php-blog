<?php

if (!function_exists('numberToFullyMonthName')) {
    function numberToFullyMonthName(int $month) {
        $monthNames = [
            1  => 'Janvier',
            2  => 'Février',
            3  => 'Mars',
            4  => 'Avril',
            5  => 'Mai',
            6  => 'Juin',
            7  => 'Juillet',
            8  => 'Août',
            9  => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre',
        ];

        return $monthNames[$month];
    }
}

if (!function_exists('numberToAbbrMonthName')) {
    function numberToAbbrMonthName(int $month) {
        $monthNames = [
            1  => 'Janv',
            2  => 'Févr',
            3  => 'Mars',
            4  => 'Avr',
            5  => 'Mai',
            6  => 'Juin',
            7  => 'Juill',
            8  => 'Août',
            9  => 'Sept',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Déc',
        ];

        return $monthNames[$month];
    }
}
