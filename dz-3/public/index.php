<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$images = [
    [
        'id' => '1',
        'name' => 'space',
        'address' => '/public/images/space.jpg'
    ],
    [
        'id' => '2',
        'name' => 'ocean',
        'address' => '/public/images/ocean.jpg'
    ],
];

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');

$twig = new Environment($loader);

echo $twig->render('home/index.twig', ['images' => $images]);

