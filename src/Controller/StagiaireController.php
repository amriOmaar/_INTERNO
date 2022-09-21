<?php

namespace App\Controller;

use App\Entity\Stagiaire;
use App\Form\StagiaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stagiaire")
 */
class StagiaireController extends AbstractController
{
    /**
     * @Route("/back", name="app_stagiaire_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $stagiaires = $entityManager
            ->getRepository(Stagiaire::class)
            ->findAll();

        return $this->render('stagiaire/index.html.twig', [
            'stagiaires' => $stagiaires,
        ]);
    }


    /**
     * @Route("/front", name="app_stagiaire_index_front", methods={"GET"})
     */
    public function indexfront(EntityManagerInterface $entityManager): Response
    {
        $stagiaires = $entityManager
            ->getRepository(Stagiaire::class)
            ->findAll();

        return $this->render('stagiaire/indexfront.html.twig', [
            'stagiaires' => $stagiaires,
        ]);
    }


    /**
     * @Route("/new", name="app_stagiaire_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $stagiaire = new Stagiaire();
        $form = $this->createForm(StagiaireType::class, $stagiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($stagiaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_stagiaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stagiaire/new.html.twig', [
            'stagiaire' => $stagiaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("show/stagiaire/{idStagiaire}", name="app_stagiaire_show", methods={"GET"})
     */
    public function show(Stagiaire $stagiaire): Response
    {
        return $this->render('stagiaire/show.html.twig', [
            'stagiaire' => $stagiaire,
        ]);
    }

    /**
     * @Route("/{idStagiaire}/edit", name="app_stagiaire_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Stagiaire $stagiaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StagiaireType::class, $stagiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_stagiaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('stagiaire/edit.html.twig', [
            'stagiaire' => $stagiaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idStagiaire}", name="app_stagiaire_delete", methods={"POST"})
     */
    public function delete(Request $request, Stagiaire $stagiaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stagiaire->getIdStagiaire(), $request->request->get('_token'))) {
            $entityManager->remove($stagiaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_stagiaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
