<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$imageAddress = $_GET['imageAddress'];

var_dump($_POST);
die();

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');

$twig = new Environment($loader);

echo $twig->render('show/index.twig', ['address' => $imageAddress]);