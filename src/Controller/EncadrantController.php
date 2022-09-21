<?php

namespace App\Controller;

use App\Entity\Encadrant;
use App\Form\EncadrantType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/encadrant")
 */
class EncadrantController extends AbstractController
{
    /**
     * @Route("/back", name="app_encadrant_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $encadrants = $entityManager
            ->getRepository(Encadrant::class)
            ->findAll();

        return $this->render('encadrant/index.html.twig', [
            'encadrants' => $encadrants,
        ]);
    }

    /**
     * @Route("/front", name="app_encadrant_index_front", methods={"GET"})
     */
    public function indexfront(EntityManagerInterface $entityManager): Response
    {
        $encadrants = $entityManager
            ->getRepository(Encadrant::class)
            ->findAll();

        return $this->render('encadrant/indexfront.html.twig', [
            'encadrants' => $encadrants,
        ]);
    }

    /**
     * @Route("/new", name="app_encadrant_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $encadrant = new Encadrant();
        $form = $this->createForm(EncadrantType::class, $encadrant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($encadrant);
            $entityManager->flush();

            return $this->redirectToRoute('app_encadrant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('encadrant/new.html.twig', [
            'encadrant' => $encadrant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEncadrant}", name="app_encadrant_show", methods={"GET"})
     */
    public function show(Encadrant $encadrant): Response
    {
        return $this->render('encadrant/show.html.twig', [
            'encadrant' => $encadrant,
        ]);
    }

    /**
     * @Route("/{idEncadrant}/edit", name="app_encadrant_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Encadrant $encadrant, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EncadrantType::class, $encadrant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_encadrant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('encadrant/edit.html.twig', [
            'encadrant' => $encadrant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEncadrant}", name="app_encadrant_delete", methods={"POST"})
     */
    public function delete(Request $request, Encadrant $encadrant, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$encadrant->getIdEncadrant(), $request->request->get('_token'))) {
            $entityManager->remove($encadrant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_encadrant_index', [], Response::HTTP_SEE_OTHER);
    }
}
