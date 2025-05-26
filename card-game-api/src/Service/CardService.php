<?php

namespace App\Service;

use App\Enum\CardEnum;
use App\Model\Card;

class CardService
{
    public function generateHand(): array
    {
        $deck = [];

        foreach (CardEnum::COLORS as $color) {
            foreach (CardEnum::VALUES as $value) {
                $deck[] = new Card($color, $value);
            }
        }

        shuffle($deck);

        return array_slice($deck, 0, 10);
    }

    public function sortHand(array $hand): array
    {
        usort($hand, function (Card $a, Card $b) {
            $colorComparison = CardEnum::COLOR_ORDER[$a->getColor()] <=> CardEnum::COLOR_ORDER[$b->getColor()];
            if ($colorComparison !== 0) {
                return $colorComparison;
            }

            return CardEnum::VALUE_ORDER[$a->getValue()] <=> CardEnum::VALUE_ORDER[$b->getValue()];
        });

        return $hand;
    }
}
