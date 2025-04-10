<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class Navbar
{
    public string $test = "test";
    public array $routes = [
        [
            'name' => 'Home',
            'path' => 'homepage:index'
        ]
    ];
}
