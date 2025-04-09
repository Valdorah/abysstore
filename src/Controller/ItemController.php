<?php

namespace App\Controller;

use App\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/items')]
final class ItemController extends AbstractController
{
    #[Route('/{id}', name: 'item:show', requirements: ['id' => '\d+'])]
    public function show(Item $item): Response
    {
        return $this->render('item/show.html.twig', compact('item'));
    }
}
