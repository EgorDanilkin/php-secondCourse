<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PublicationAddController extends AbstractController
{
    #[Route('/publication/add', name: 'publication_add')]
    public function index(Request $request): Response
    {

        $publication = new Publication();

        $form = $this->createForm(PublicationType::class, $publication);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $publication = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($publication);

            $entityManager->flush();
        }
        return $this->render('publication_add/index.html.twig', [
            'controller_name' => 'PublicationAddController',
            'form' => $form->createView(),
        ]);
    }
}
