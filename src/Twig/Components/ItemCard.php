<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ItemCard
{
    public string $name;
    public string $description;
    public float $priceExcludingTaxes;
}
