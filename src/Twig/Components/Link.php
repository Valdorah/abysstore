<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Link
{
    public string $url;
    public string $label;
    public string $type = 'primary';
    public ?string $icon = null;
}
