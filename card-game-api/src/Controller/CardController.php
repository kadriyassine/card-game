<?php

namespace App\Controller;

use App\Service\CardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    public function __construct(private CardService $cardService) {}

    #[Route('/api/hand', name: 'api_hand', methods: ['GET'])]
    public function getHand(): JsonResponse
    {
        $hand = $this->cardService->generateHand();
        return $this->json(array_map(fn($card) => $card->toArray(), $hand));
    }

    #[Route('/api/hand/sorted', name: 'api_hand_sorted', methods: ['GET'])]
    public function getSortedHand(): JsonResponse
    {
        $hand = $this->cardService->generateHand();
        $sortedHand = $this->cardService->sortHand($hand);
        return $this->json([
            'initial' => array_map(fn($card) => $card->toArray(), $hand),
            'sorted' => array_map(fn($card) => $card->toArray(), $sortedHand),
        ]);
    }
}
