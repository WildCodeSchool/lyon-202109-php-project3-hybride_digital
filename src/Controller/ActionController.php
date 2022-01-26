<?php

namespace App\Controller;

use App\Entity\Action;
use App\Form\ActionType;
use App\Repository\ActionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/action", name="action_")
 * @IsGranted("ROLE_USER")
 */
class ActionController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ActionRepository $actionRepository): Response
    {
        return $this->render('action/index.html.twig', [
            'actions' => $actionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $action = new Action();
        $form = $this->createForm(ActionType::class, $action);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($action);
            $entityManager->flush();

            return $this->redirectToRoute('action_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('action/new.html.twig', [
            'action' => $action,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Action $action): Response
    {
        return $this->render('action/show.html.twig', [
            'action' => $action,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Action $action, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ActionType::class, $action);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('action_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('action/edit.html.twig', [
            'action' => $action,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Action $action, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $action->getId(), (string)$request->request->get('_token'))) {
            $entityManager->remove($action);
            $entityManager->flush();
        }

        return $this->redirectToRoute('action_index', [], Response::HTTP_SEE_OTHER);
    }
}
