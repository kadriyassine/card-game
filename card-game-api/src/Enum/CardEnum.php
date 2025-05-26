<?php

namespace App\Enum;

class CardEnum
{
    public const COLORS = ['Carreaux', 'Cœur', 'Pique', 'Trèfle'];
    public const VALUES = ['AS', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi'];

    public const COLOR_ORDER = [
        'Carreaux' => 0,
        'Cœur' => 1,
        'Pique' => 2,
        'Trèfle' => 3,
    ];

    public const VALUE_ORDER = [
        'AS' => 0,
        '2' => 1,
        '3' => 2,
        '4' => 3,
        '5' => 4,
        '6' => 5,
        '7' => 6,
        '8' => 7,
        '9' => 8,
        '10' => 9,
        'Valet' => 10,
        'Dame' => 11,
        'Roi' => 12,
    ];
}
