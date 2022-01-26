<?php

namespace App\Controller;

use App\Entity\Roadmap;
use App\Form\RoadmapType;
use App\Repository\RoadmapRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/roadmap")
 */
class RoadmapController extends AbstractController
{
    /**
     * @Route("/", name="roadmap_index", methods={"GET"})
     */
    public function index(RoadmapRepository $roadmapRepository): Response
    {
        return $this->render('roadmap/index.html.twig', [
            'roadmaps' => $roadmapRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="roadmap_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $roadmap = new Roadmap();
        $form = $this->createForm(RoadmapType::class, $roadmap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($roadmap);
            $entityManager->flush();

            return $this->redirectToRoute('roadmap_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('roadmap/new.html.twig', [
            'roadmap' => $roadmap,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="roadmap_show", methods={"GET"})
     */
    public function show(Roadmap $roadmap): Response
    {
        return $this->render('roadmap/show.html.twig', [
            'roadmap' => $roadmap,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="roadmap_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Roadmap $roadmap, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RoadmapType::class, $roadmap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('roadmap_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('roadmap/edit.html.twig', [
            'roadmap' => $roadmap,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="roadmap_delete", methods={"POST"})
     */
    public function delete(Request $request, Roadmap $roadmap, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $roadmap->getId(), (string)$request->request->get('_token'))) {
            $entityManager->remove($roadmap);
            $entityManager->flush();
        }

        return $this->redirectToRoute('roadmap_index', [], Response::HTTP_SEE_OTHER);
    }
}
