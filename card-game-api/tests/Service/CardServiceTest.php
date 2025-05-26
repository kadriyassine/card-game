<?php

namespace App\Tests\Service;

use App\Enum\CardEnum;
use App\Service\CardService;
use PHPUnit\Framework\TestCase;
use App\Model\Card;

class CardServiceTest extends TestCase
{
    private CardService $cardService;

    protected function setUp(): void
    {
        $this->cardService = new CardService();
    }

    public function testGenerateHandReturnsTenCards(): void
    {
        $hand = $this->cardService->generateHand();
        $this->assertCount(10, $hand);
        $this->assertContainsOnlyInstancesOf(Card::class, $hand);
    }

    public function testSortHandOrdersCardsCorrectly(): void
    {
        $hand = [
            new Card('Trèfle', 'Roi'),
            new Card('Carreaux', 'AS'),
            new Card('Pique', '2'),
            new Card('Cœur', 'Dame'),
            new Card('Pique', 'AS'),
        ];

        $sorted = $this->cardService->sortHand($hand);

        $expected = [
            ['Carreaux', 'AS'],
            ['Cœur', 'Dame'],
            ['Pique', 'AS'],
            ['Pique', '2'],
            ['Trèfle', 'Roi'],
        ];

        foreach ($expected as $index => [$color, $value]) {
            $this->assertEquals($color, $sorted[$index]->getColor());
            $this->assertEquals($value, $sorted[$index]->getValue());
        }
    }
}
