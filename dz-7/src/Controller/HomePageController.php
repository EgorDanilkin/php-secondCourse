<?php

namespace App\Controller;

use App\Entity\Publication;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomePageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(): Response
    {

        $publications = $this->getDoctrine()->getRepository(Publication::class);

        $publication = $publications->findAll();

        $publication = Publication::sortOnDateAsc($publication);
        dump($publication);

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'Home',
            'publication' => $publication,
        ]);
    }
}
